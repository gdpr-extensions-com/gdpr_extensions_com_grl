<?php

declare(strict_types=1);

namespace GdprExtensionsCom\GdprExtensionsComGrl\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 */
class googlereviewlistTest extends UnitTestCase
{
    /**
     * @var \GdprExtensionsCom\GdprExtensionsComGrl\Domain\Model\googlereviewlist|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \GdprExtensionsCom\GdprExtensionsComGrl\Domain\Model\googlereviewlist::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function dummyTestToNotLeaveThisFileEmpty(): void
    {
        self::markTestIncomplete();
    }
}
