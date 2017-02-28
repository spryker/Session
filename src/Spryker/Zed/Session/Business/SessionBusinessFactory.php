<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Session\Business;

use Predis\Client;
use Spryker\Shared\Config\Config;
use Spryker\Shared\Session\SessionConstants;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Spryker\Zed\Session\Business\Exception\NotALockingSessionHandlerException;
use Spryker\Zed\Session\Business\Lock\Redis\RedisSessionLockReader;
use Spryker\Zed\Session\Business\Lock\SessionLockReleaser;
use Spryker\Zed\Session\Business\Model\SessionFactory;

/**
 * @method \Spryker\Zed\Session\SessionConfig getConfig()
 */
class SessionBusinessFactory extends AbstractBusinessFactory
{

    /**
     * @throws \Spryker\Zed\Session\Business\Exception\NotALockingSessionHandlerException
     *
     * @return \Spryker\Zed\Session\Business\Lock\SessionLockReleaserInterface
     */
    public function createYvesSessionLockReleaser()
    {
        switch (Config::get(SessionConstants::YVES_SESSION_SAVE_HANDLER)) {
            case SessionConstants::SESSION_HANDLER_REDIS_LOCKING:
                $dsn = $this->buildYvesRedisDsn();

                return $this->createRedisSessionLockReleaser($dsn);
        }

        throw new NotALockingSessionHandlerException(sprintf(
            "The configured session handler '%s' doesn't seem to support locking",
            Config::get(SessionConstants::YVES_SESSION_SAVE_HANDLER)
        ));
    }

    /**
     * @return string
     */
    protected function buildYvesRedisDsn()
    {
        $authFragment = '';
        if (Config::hasKey(SessionConstants::YVES_SESSION_REDIS_PASSWORD)) {
            $authFragment = sprintf('h:%s@', Config::get(SessionConstants::YVES_SESSION_REDIS_PASSWORD));
        }

        return sprintf(
            '%s://%s%s:%s?database=%s',
            Config::get(SessionConstants::YVES_SESSION_REDIS_PROTOCOL),
            $authFragment,
            Config::get(SessionConstants::YVES_SESSION_REDIS_HOST),
            Config::get(SessionConstants::YVES_SESSION_REDIS_PORT),
            Config::get(SessionConstants::YVES_SESSION_REDIS_DATABASE, 0)
        );
    }

    /**
     * @throws \Spryker\Zed\Session\Business\Exception\NotALockingSessionHandlerException
     *
     * @return \Spryker\Zed\Session\Business\Lock\SessionLockReleaserInterface
     */
    public function createZedSessionLockReleaser()
    {
        switch (Config::get(SessionConstants::ZED_SESSION_SAVE_HANDLER)) {
            case SessionConstants::SESSION_HANDLER_REDIS_LOCKING:
                $dsn = $this->buildZedRedisDsn();

                return $this->createRedisSessionLockReleaser($dsn);
        }

        throw new NotALockingSessionHandlerException(sprintf(
            "The configured session handler '%s' doesn't seem to support locking",
            Config::get(SessionConstants::ZED_SESSION_SAVE_HANDLER)
        ));
    }

    /**
     * @return string
     */
    protected function buildZedRedisDsn()
    {
        $authFragment = '';
        if (Config::hasKey(SessionConstants::ZED_SESSION_REDIS_PASSWORD)) {
            $authFragment = sprintf('h:%s@', Config::get(SessionConstants::ZED_SESSION_REDIS_PASSWORD));
        }

        return sprintf(
            '%s://%s%s:%s?database=%s',
            Config::get(SessionConstants::ZED_SESSION_REDIS_PROTOCOL),
            $authFragment,
            Config::get(SessionConstants::ZED_SESSION_REDIS_HOST),
            Config::get(SessionConstants::ZED_SESSION_REDIS_PORT),
            Config::get(SessionConstants::ZED_SESSION_REDIS_DATABASE, 0)
        );
    }

    /**
     * @param $dsn
     *
     * @return \Spryker\Zed\Session\Business\Lock\SessionLockReleaserInterface
     */
    protected function createRedisSessionLockReleaser($dsn)
    {
        $redisClient = $this->getRedisClient($dsn);

        return new SessionLockReleaser(
            $this->getRedisSessionLocker($redisClient),
            $this->createRedisSessionLockReader($redisClient)
        );
    }

    /**
     * @param string $dsn
     *
     * @return \Predis\Client
     */
    protected function getRedisClient($dsn)
    {
        return $this
            ->createSessionHandlerFactory()
            ->createRedisClient($dsn);
    }

    /**
     * @param \Predis\Client $redisClient
     *
     * @return \Spryker\Shared\Session\Business\Handler\Lock\SessionLockerInterface
     */
    protected function getRedisSessionLocker(Client $redisClient)
    {
        return $this
            ->createSessionHandlerFactory()
            ->createRedisSpinLockLocker($redisClient);
    }

    /**
     * @return \Spryker\Zed\Session\Business\Model\SessionFactory
     */
    protected function createSessionHandlerFactory()
    {
        return new SessionFactory();
    }

    /**
     * @param \Predis\Client $redisClient
     *
     * @return \Spryker\Zed\Session\Business\Lock\SessionLockReaderInterface
     */
    protected function createRedisSessionLockReader(Client $redisClient)
    {
        return new RedisSessionLockReader(
            $redisClient,
            $this->createRedisLockKeyGenerator()
        );
    }

    /**
     * @return \Spryker\Shared\Session\Business\Handler\KeyGenerator\LockKeyGeneratorInterface
     */
    protected function createRedisLockKeyGenerator()
    {
        return $this
            ->createSessionHandlerFactory()
            ->createRedisLockKeyGenerator();
    }

}
