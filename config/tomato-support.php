<?php

use TomatoPHP\TomatoSupport\Transformers\FAQResource;
use TomatoPHP\TomatoSupport\Transformers\PagesResource;
use TomatoPHP\TomatoSupport\Transformers\TicketsResource;
use TomatoPHP\TomatoSupport\Transformers\TicketResource;

return [
    "actions" => null,
    "show_create_ticket_button" => true,
    "resources" => [
        "tickets" => [
            "index" => TicketsResource::class,
            "show" => TicketResource::class
        ],
        "pages" => [
            "index" => PagesResource::class,
            "show" => PagesResource::class
        ],
        "faq" => [
            "index" => FAQResource::class,
            "show" => FAQResource::class
        ]
    ]
];
