<?php

namespace Tests\App;

use CodeIgniter\Test\CIUnitTestCase;

/**
 * @internal
 */
final class ValidationRulesTest extends CIUnitTestCase
{
    public function testStudyLogValidationFailsWithoutTopic(): void
    {
        $validation = service('validation');

        $rules = [
            'subject' => 'required|max_length[100]',
            'topic'   => 'required|max_length[255]',
        ];

        $passed = $validation->setRules($rules)->run([
            'subject' => 'Math',
            'topic'   => '',
        ]);

        $this->assertFalse($passed);
        $this->assertTrue($validation->getErrors() !== []);
    }

    public function testStudyLogValidationPassesWithValidData(): void
    {
        $validation = service('validation');

        $rules = [
            'subject' => 'required|max_length[100]',
            'topic'   => 'required|max_length[255]',
        ];

        $passed = $validation->setRules($rules)->run([
            'subject' => 'Math',
            'topic'   => 'Algebra',
        ]);

        $this->assertTrue($passed);
    }
}
