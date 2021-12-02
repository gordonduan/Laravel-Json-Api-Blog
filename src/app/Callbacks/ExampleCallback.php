<?php

namespace App\Callbacks;

use OrbitRemit\LaravelCallbacks\Callbacks\Callback;
use OrbitRemit\LaravelCallbacks\Contracts\Callbacks\ProvidesValidationRules;
use OrbitRemit\LaravelGoogleCloudPubSubPush\Callbacks\Request;

class ExampleCallback extends Callback implements ProvidesValidationRules
{
    public function __construct()
    {
        $this->middleware([
            'google-pubsub-push.authenticate',
            'google-pubsub-push.json-decode-message-data',
        ]);
    }

    public function validationRules(): array
    {
        return [
        ];
    }

    /**
     * Example callback invoke
     *
     * @param Request $request
     */
    public function __invoke(Request $request)
    {
        $data = $request->input('message.data.data');
        return response('', 201);
    }
}
