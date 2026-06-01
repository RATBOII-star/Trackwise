<?php

namespace Tests\App;

use App\Models\Trackwise\StudySessionModel;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * @internal
 */
final class StudySessionModelTest extends CIUnitTestCase
{
    public function testFormatDuration(): void
    {
        $model = new StudySessionModel();

        $this->assertEquals('2h 30m', $model->formatDuration(2, 30));
        $this->assertEquals('45m', $model->formatDuration(0, 45));
        $this->assertNotNull($model->getSubjects());
        $this->assertTrue(count($model->getSubjects()) >= 3);
    }
}
