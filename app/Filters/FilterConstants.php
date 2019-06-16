<?php

namespace App\Filters;


class FilterConstants
{
    // USER
    const USER_INCLUDES = [];
    const USER_EXACT = ['id'];
    const USER_PARTIAL = [
        'email',
        'full_name',
        'number',
        'role'
    ];
      // Training Tests
    const TRAINING_TEST_INCLUDES = ['questions.answers', 'questions.stdAnswers'];
    const TRAINING_TEST_EXACT = ['id'];
    const TRAINING_TEST_PARTIAL = [
        'name',
    ];

    // Training Questions
    const TRAINING_QUESTION_INCLUDES = ['answers', 'stdanswers', 'tests'];
    const TRAINING_QUESTION_EXACT = ['id', 'test_id'];
    const TRAINING_QUESTION_PARTIAL = [
        'name',
    ];

    // Literature
    const LITERATURE_INCLUDES = [];
    const LITERATURE_EXACT = ['id'];
    const LITERATURE_PARTIAL = [
        'name'
    ];


}
