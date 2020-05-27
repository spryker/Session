<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Shared\Session;

/**
 * Declares global environment configuration keys. Do not use it for other class constants.
 */
interface SessionConstants
{
    public const SESSION_IS_TEST = 'SESSION:SESSION_IS_TEST';

    /**
     * @deprecated Use {@link \Spryker\Shared\SessionRedis\SessionRedisConstants::LOCKING_TIMEOUT_MILLISECONDS} instead.
     */
    public const SESSION_HANDLER_REDIS_LOCKING_TIMEOUT_MILLISECONDS = 'SESSION:SESSION_HANDLER_REDIS_LOCKING_TIMEOUT_MILLISECONDS';

    /**
     * @deprecated Use {@link \Spryker\Shared\SessionRedis\SessionRedisConstants::LOCKING_RETRY_DELAY_MICROSECONDS} instead.
     */
    public const SESSION_HANDLER_REDIS_LOCKING_RETRY_DELAY_MICROSECONDS = 'SESSION:SESSION_HANDLER_REDIS_LOCKING_RETRY_DELAY_MICROSECONDS';

    /**
     * @deprecated Use {@link \Spryker\Shared\SessionRedis\SessionRedisConstants::LOCKING_LOCK_TTL_MILLISECONDS} instead.
     */
    public const SESSION_HANDLER_REDIS_LOCKING_LOCK_TTL_MILLISECONDS = 'SESSION:SESSION_HANDLER_REDIS_LOCKING_LOCK_TTL_MILLISECONDS';

    public const YVES_SESSION_SAVE_HANDLER = 'SESSION:YVES_SESSION_SAVE_HANDLER';
    public const YVES_SESSION_COOKIE_NAME = 'SESSION:YVES_SESSION_COOKIE_NAME';
    public const YVES_SESSION_COOKIE_SECURE = 'SESSION:YVES_SESSION_COOKIE_SECURE';
    public const YVES_SESSION_COOKIE_DOMAIN = 'SESSION:YVES_SESSION_COOKIE_DOMAIN';
    public const YVES_SESSION_COOKIE_PATH = 'SESSION:YVES_SESSION_COOKIE_PATH';
    public const YVES_SESSION_COOKIE_TIME_TO_LIVE = 'SESSION:YVES_SESSION_COOKIE_TIME_TO_LIVE';

    /**
     * Specification:
     * - Allows to declare if your Yves session cookie should be restricted to a first-party or same-site context.
     * - Available since PHP 7.3.0.
     */
    public const YVES_SESSION_COOKIE_SAMESITE = 'SESSION:YVES_SESSION_COOKIE_SAMESITE';

    /**
     * @deprecated Use {@link \Spryker\Shared\SessionFile\SessionFileConstants::YVES_SESSION_FILE_PATH} instead.
     */
    public const YVES_SESSION_FILE_PATH = 'SESSION:YVES_SESSION_FILE_PATH';
    public const YVES_SESSION_PERSISTENT_CONNECTION = 'SESSION:YVES_SESSION_PERSISTENT_CONNECTION';
    public const YVES_SESSION_TIME_TO_LIVE = 'SESSION:YVES_SESSION_TIME_TO_LIVE';
    public const YVES_SSL_ENABLED = 'SESSION:YVES_SSL_ENABLED';

    /**
     * @deprecated Use {@link \Spryker\Shared\SessionRedis\SessionRedisConstants::YVES_SESSION_REDIS_PROTOCOL} instead.
     */
    public const YVES_SESSION_REDIS_PROTOCOL = 'SESSION:YVES_SESSION_REDIS_PROTOCOL';

    /**
     * @deprecated Use {@link \Spryker\Shared\SessionRedis\SessionRedisConstants::YVES_SESSION_REDIS_PASSWORD} instead.
     */
    public const YVES_SESSION_REDIS_PASSWORD = 'SESSION:YVES_SESSION_REDIS_PASSWORD';

    /**
     * @deprecated Use {@link \Spryker\Shared\SessionRedis\SessionRedisConstants::YVES_SESSION_REDIS_HOST} instead.
     */
    public const YVES_SESSION_REDIS_HOST = 'SESSION:YVES_SESSION_REDIS_HOST';

    /**
     * @deprecated Use {@link \Spryker\Shared\SessionRedis\SessionRedisConstants::YVES_SESSION_REDIS_PORT} instead.
     */
    public const YVES_SESSION_REDIS_PORT = 'SESSION:YVES_SESSION_REDIS_PORT';

    /**
     * @deprecated Use {@link \Spryker\Shared\SessionRedis\SessionRedisConstants::YVES_SESSION_REDIS_DATABASE} instead.
     */
    public const YVES_SESSION_REDIS_DATABASE = 'SESSION:YVES_SESSION_REDIS_DATABASE';

    /**
     * Specification:
     * - Defines a custom configuration for \Predis\Client when used as Yves session storage.
     * - This configuration is used exclusively when set, e.g. no other storage configuration will be used for the client.
     *
     * @api
     *
     * @deprecated Use {@link \Spryker\Shared\SessionRedis\SessionRedisConstants::YVES_SESSION_REDIS_DATA_SOURCE_NAMES} instead.
     */
    public const YVES_SESSION_PREDIS_CLIENT_CONFIGURATION = 'SESSION:YVES_SESSION_PREDIS_CLIENT_CONFIGURATION';

    /**
     * Specification:
     * - Defines custom options for \Predis\Client when used as Yves session storage.
     *
     * @api
     *
     * @deprecated Use {@link \Spryker\Shared\SessionRedis\SessionRedisConstants::YVES_SESSION_REDIS_CLIENT_OPTIONS} instead.
     */
    public const YVES_SESSION_PREDIS_CLIENT_OPTIONS = 'SESSION:YVES_SESSION_PREDIS_CLIENT_OPTIONS';

    public const ZED_SSL_ENABLED = 'SESSION:ZED_SSL_ENABLED';
    public const ZED_SESSION_SAVE_HANDLER = 'SESSION:ZED_SESSION_SAVE_HANDLER';
    public const ZED_SESSION_COOKIE_NAME = 'SESSION:ZED_SESSION_COOKIE_NAME';
    public const ZED_SESSION_COOKIE_SECURE = 'SESSION:ZED_SESSION_COOKIE_SECURE';
    public const ZED_SESSION_COOKIE_DOMAIN = 'SESSION:ZED_SESSION_COOKIE_DOMAIN';
    public const ZED_SESSION_COOKIE_PATH = 'SESSION:ZED_SESSION_COOKIE_PATH';
    public const ZED_SESSION_COOKIE_TIME_TO_LIVE = 'SESSION:ZED_SESSION_COOKIE_TIME_TO_LIVE';

    /**
     * Specification:
     * - Allows to declare if your Zed session cookie should be restricted to a first-party or same-site context.
     * - Available since PHP 7.3.0.
     */
    public const ZED_SESSION_COOKIE_SAMESITE = 'SESSION:ZED_SESSION_COOKIE_SAMESITE';

    /**
     * @deprecated Use {@link \Spryker\Shared\SessionFile\SessionFileConstants::ZED_SESSION_FILE_PATH} instead.
     */
    public const ZED_SESSION_FILE_PATH = 'SESSION:ZED_SESSION_FILE_PATH';
    public const ZED_SESSION_PERSISTENT_CONNECTION = 'SESSION:ZED_SESSION_PERSISTENT_CONNECTION';
    public const ZED_SESSION_TIME_TO_LIVE = 'SESSION:ZED_SESSION_TIME_TO_LIVE';

    /**
     * @deprecated Use {@link \Spryker\Shared\SessionRedis\SessionRedisConstants::ZED_SESSION_REDIS_PROTOCOL} instead.
     */
    public const ZED_SESSION_REDIS_PROTOCOL = 'SESSION:ZED_SESSION_REDIS_PROTOCOL';

    /**
     * @deprecated Use {@link \Spryker\Shared\SessionRedis\SessionRedisConstants::ZED_SESSION_REDIS_HOST} instead.
     */
    public const ZED_SESSION_REDIS_HOST = 'SESSION:ZED_SESSION_REDIS_HOST';

    /**
     * @deprecated Use {@link \Spryker\Shared\SessionRedis\SessionRedisConstants::ZED_SESSION_REDIS_PORT} instead.
     */
    public const ZED_SESSION_REDIS_PORT = 'SESSION:ZED_SESSION_REDIS_PORT';

    /**
     * @deprecated Use {@link \Spryker\Shared\SessionRedis\SessionRedisConstants::ZED_SESSION_REDIS_PASSWORD} instead.
     */
    public const ZED_SESSION_REDIS_PASSWORD = 'SESSION:ZED_SESSION_REDIS_PASSWORD';

    /**
     * @deprecated Use {@link \Spryker\Shared\SessionRedis\SessionRedisConstants::ZED_SESSION_REDIS_DATABASE} instead.
     */
    public const ZED_SESSION_REDIS_DATABASE = 'SESSION:ZED_SESSION_REDIS_DATABASE';

    /**
     * Specification:
     * - Defines a custom configuration for \Predis\Client when used as Zed session storage.
     * - This configuration is used exclusively when set, e.g. no other storage configuration will be used for the client.
     *
     * @api
     *
     * @deprecated Use {@link \Spryker\Shared\SessionRedis\SessionRedisConstants::ZED_SESSION_REDIS_DATA_SOURCE_NAMES} instead.
     */
    public const ZED_SESSION_PREDIS_CLIENT_CONFIGURATION = 'SESSION:ZED_SESSION_PREDIS_CLIENT_CONFIGURATION';

    /**
     * Specification:
     * - Defines custom options for \Predis\Client when used as Zed session storage.
     *
     * @api
     *
     * @deprecated Use {@link \Spryker\Shared\SessionRedis\SessionRedisConstants::ZED_SESSION_REDIS_CLIENT_OPTIONS} instead.
     */
    public const ZED_SESSION_PREDIS_CLIENT_OPTIONS = 'SESSION:ZED_SESSION_PREDIS_CLIENT_OPTIONS';
}
