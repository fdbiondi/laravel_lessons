<?php

use Faker\Generator;
use TeachMe\Entities\TicketVote;
use Styde\Seeder\Seeder;

class TicketVoteTableSeeder extends Seeder
{
    protected $total = 250;

    public function getModel()
    {
        return new TicketVote();
    }

    public function getDummyData(Generator $faker, array $customValues = array())
    {
        return [
            'user_id' => $this->random('User')->id,
            'ticket_id' => $this->random('Ticket')->id,
        ];
    }
}
