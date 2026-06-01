<?php

namespace App\Models\Trackwise;

use CodeIgniter\Model;

class TechniqueModel extends Model
{
    public function getTechniques(): array
    {
        return [
            [
                'slug'        => 'pomodoro',
                'title'       => 'Pomodoro Technique',
                'subtitle'    => '25 min focus + 5 min break',
                'icon'        => '&#9201;',
                'colorClass'  => 'tw-technique-pink',
                'description' => 'Work for 25 minutes, then take a 5-minute break. After 4 sessions, take a longer 15-30 minute break.',
            ],
            [
                'slug'        => 'feynman',
                'title'       => 'Feynman Technique',
                'subtitle'    => 'Learn by teaching others',
                'icon'        => '&#128101;',
                'colorClass'  => 'tw-technique-blue',
                'description' => 'Explain a concept in simple terms as if teaching someone else. Identify gaps in your understanding and review them.',
            ],
            [
                'slug'        => 'active-recall',
                'title'       => 'Active Recall',
                'subtitle'    => 'Test yourself regularly',
                'icon'        => '&#128161;',
                'colorClass'  => 'tw-technique-purple',
                'description' => 'Close your notes and try to recall key information from memory. Use flashcards or practice questions to strengthen retention.',
            ],
            [
                'slug'        => 'spaced-repetition',
                'title'       => 'Spaced Repetition',
                'subtitle'    => 'Review at increasing intervals',
                'icon'        => '&#128260;',
                'colorClass'  => 'tw-technique-green',
                'description' => 'Review material at gradually increasing intervals. This combats the forgetting curve and builds long-term memory.',
            ],
        ];
    }

    public function getTips(): array
    {
        return [
            'Take regular breaks to maintain focus.',
            'Study in a quiet, well-lit environment.',
            'Mix different techniques for best results.',
            'Stay hydrated and get enough sleep.',
        ];
    }
}
