<?php

namespace App\Observers;

use App\User;
use App\Models\Feedback;
use App\Notifications\NewSubscriber;
use App\Notifications\Subscribed;
use App\Notifications\QuestionSend;
use App\Notifications\QuestionReceived;
use App\Notifications\OrderCreatedUser;
use App\Notifications\OrderCreatedAdmin;
use App\Notifications\OrderQuestionUser;
use App\Notifications\OrderQuestionAdmin;
//use Illuminate\Support\Facades\Mail;

class FeedbackObserver
{
    /**
     * Handle the feedback "created" event.
     *
     * @param  \App\Feedback  $feedback
     * @return void
     */
    public function created(Feedback $feedback)
    {
        // admin
        $user = User::find(1);

        if($feedback->type == 'message'){
            $user->notify(new OrderQuestionAdmin($feedback));
            $feedback->notify(new OrderQuestionUser($feedback));
        }else {
            $user->notify(new OrderCreatedAdmin($feedback));
            $feedback->notify(new OrderCreatedUser($feedback));
        }
    }

    /**
     * Handle the feedback "updated" event.
     *
     * @param  \App\Feedback  $feedback
     * @return void
     */
    public function updated(Feedback $feedback)
    {
        //
    }

    /**
     * Handle the feedback "deleted" event.
     *
     * @param  \App\Feedback  $feedback
     * @return void
     */
    public function deleted(Feedback $feedback)
    {
        //
    }

    /**
     * Handle the feedback "restored" event.
     *A
     * @param  \App\Feedback  $feedback
     * @return void
     */
    public function restored(Feedback $feedback)
    {
        //
    }

    /**
     * Handle the feedback "force deleted" event.
     *
     * @param  \App\Feedback  $feedback
     * @return void
     */
    public function forceDeleted(Feedback $feedback)
    {
        //
    }
}
