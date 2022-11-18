<?php

namespace App\Http\Controllers;

use App\Http\Requests\PollAnswerRequest;
use App\Http\Resources\PollResource;
use App\Models\Poll;
use App\Models\PollQuestionAnswer;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PollController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    final public function index(): AnonymousResourceCollection
    {
        $polls = Poll::with('questions')->orderBy('updated_at', 'DESC')->get();

        return PollResource::collection($polls);
    }

    public function pollAnswer(PollAnswerRequest $pollAnswerRequest)
    {
        PollQuestionAnswer::create($pollAnswerRequest->all());

        $poll = Poll::query()->find( $pollAnswerRequest->poll_id);

        return PollResource::make($poll);
    }
}
