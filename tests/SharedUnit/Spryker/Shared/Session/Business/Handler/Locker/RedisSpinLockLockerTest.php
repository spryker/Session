<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SharedUnit\Spryker\Shared\Session\Business\Handler\Locker;

use Codeception\TestCase\Test;
use Predis\Client;
use Spryker\Shared\Session\Business\Handler\Locker\RedisSpinLockLocker;
use Spryker\Shared\Session\Business\Handler\Logger\NewRelicSessionTimedLogger;

/**
 * @group Spryker
 * @group Shared
 * @group Session
 * @group Business
 * @group Locker
 * @group RedisSpinLockLocker
 */
class RedisSpinLockLockerTest extends Test
{

    public function testLockBlocksUntilLockIsAcquired()
    {
        $redisClientMock = $this->getRedisClientMock();
        $redisClientMock
            ->expects($this->exactly(3))
            ->method('__call')
            ->with($this->equalTo('set'), $this->anything())
            ->will($this->onConsecutiveCalls(0, 0, 1));

        $locker = new RedisSpinLockLocker($redisClientMock, $this->getNewRelicSessionTimedLoggerMock());
        $locker->lock('session_id');
    }

    public function testUnlockUsesGeneratedKeyFromStoredSessionKey()
    {
        $sessionKey = 'test_session_key';
        $expectedGeneratedKey = "{$sessionKey}:lock";
        $redisClientMock = $this->getRedisClientMock();
        $redisClientMock
            ->expects($this->exactly(2))
            ->method('__call')
            ->withConsecutive(
                [$this->equalTo('set'), $this->anything()],
                [$this->equalTo('eval'), $this->contains($expectedGeneratedKey)]
            )
            ->will($this->onConsecutiveCalls(1, 1));

        $locker = new RedisSpinLockLocker($redisClientMock, $this->getNewRelicSessionTimedLoggerMock());
        $locker->lock($sessionKey);
        $locker->unlock();
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Predis\Client
     */
    private function getRedisClientMock()
    {
        return $this
            ->getMockBuilder(Client::class)
            ->getMock();
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Spryker\Shared\Session\Business\Handler\Logger\NewRelicSessionTimedLogger
     */
    private function getNewRelicSessionTimedLoggerMock()
    {
        return $this
            ->getMockBuilder(NewRelicSessionTimedLogger::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

}
