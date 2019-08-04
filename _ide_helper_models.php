<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Question[] $question
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Question
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $body
 * @property int $Thread_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Answer[] $answers
 * @property-read mixed $path
 * @property-read \App\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\QuestionVote[] $votes
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Question newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Question newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Question query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Question whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Question whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Question whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Question whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Question whereThreadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Question whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Question whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Question whereUserId($value)
 */
	class Question extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\QuestionVote
 *
 * @property int $id
 * @property int $question_id
 * @property int $user_id
 * @property int $is_vote_up
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Model\Question $question
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\QuestionVote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\QuestionVote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\QuestionVote query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\QuestionVote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\QuestionVote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\QuestionVote whereIsVoteUp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\QuestionVote whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\QuestionVote whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\QuestionVote whereUserId($value)
 */
	class QuestionVote extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Answer
 *
 * @property int $id
 * @property string $body
 * @property int $question_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Model\Question $question
 * @property-read \App\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\AnswerVote[] $votes
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Answer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Answer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Answer query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Answer whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Answer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Answer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Answer whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Answer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Answer whereUserId($value)
 */
	class Answer extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\AnswerVote
 *
 * @property int $id
 * @property int $answer_id
 * @property int $user_id
 * @property int $is_vote_up
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Model\Answer $answer
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AnswerVote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AnswerVote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AnswerVote query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AnswerVote whereAnswerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AnswerVote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AnswerVote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AnswerVote whereIsVoteUp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AnswerVote whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AnswerVote whereUserId($value)
 */
	class AnswerVote extends \Eloquent {}
}

