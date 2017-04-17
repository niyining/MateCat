<?php
/**
 * Created by PhpStorm.
 * @author domenico domenico@translated.net / ostico@gmail.com
 * Date: 16/05/14
 * Time: 17.01
 *
 */

namespace Analysis;

use \Analysis\Queue\RedisKeys,
    \RedisHandler,
    \Predis\Client,
    \INIT,
    \Log;

/**
 * Class Analysis_Manager
 *
 * Should be the final class when daemons will refactored
 *
 */
class Status {

    public static function fastAnalysisIsRunning( $redisHandler ) {

        /**
         * @var $redisHandler Client
         */

        $fastList = $redisHandler->lrange( RedisKeys::FAST_PID_LIST, 0, -1 );

        return !empty( $fastList );

    }

    public static function tmAnalysisIsRunning( $redisHandler ) {

        /**
         * @var $redisHandler Client
         */

        return (bool)$redisHandler->get( RedisKeys::VOLUME_ANALYSIS_PID );

    }

    /**
     *
     * @return bool
     */
    public static function thereIsAMisconfiguration() {

        try {
            $redisHandler = new RedisHandler();
            $redisHandler = $redisHandler->getConnection();
            return ( INIT::$VOLUME_ANALYSIS_ENABLED && !self::fastAnalysisIsRunning( $redisHandler ) && !self::tmAnalysisIsRunning( $redisHandler ) );
        } catch ( \Exception $ex ) {
            $msg = "****** No REDIS instances found. ******";
            Log::doLog( $msg );

            return false;
        }

    }
}