<?php
/**
 * User: john
 * Date: 18-10-9
 * Time: 上午1:10
 */

namespace Qnyt\Weather\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;
use Mockery\Matcher\AnyArgs;
use Qnyt\Weather\Exceptions\HttpException;
use Qnyt\Weather\Exceptions\InvalidArgumentException;
use Qnyt\Weather\Weather;
use PHPUnit\Framework\TestCase;


class WeatherTest extends TestCase
{

    public function testGetWeather()
    {


    }

    public function testGetHttpClient()
    {

    }

    public function testSetGuzzleOptions()
    {

    }

    // 检查 $type 参数
    public function testGetWeatherWithInvalidType()
    {
        $w = new Weather('mock-key');

        // 断言会抛出此异常类
        $this->expectException(InvalidArgumentException::class);

        // 断言异常消息为 'Invalid type value(base/all): foo'
        $this->expectExceptionMessage('Invalid type value(base/all): foo');

        $w->getWeather('深圳', 'foo');

        $this->fail('Faild to assert getWeather throw exception with invalid argument.');
    }

    // 检查 $format 参数
    public function testGetWeatherWithInvalidFormat()
    {
        $w = new Weather('mock-key');

        // 断言会抛出此异常类
        $this->expectException(InvalidArgumentException::class);

        // 断言异常消息为 'Invalid response format: array'
        $this->expectExceptionMessage('Invalid response format: array');

        // 因为支持的格式为 xml/json，所以传入 array 会抛出异常
        $w->getWeather('深圳', 'base', 'array');

        // 如果没有抛出异常，就会运行到这行，标记当前测试没成功
        $this->fail('Faild to assert getWeather throw exception with invalid argument.');
    }
}