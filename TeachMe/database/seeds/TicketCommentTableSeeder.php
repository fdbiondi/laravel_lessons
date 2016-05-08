<?php

use Faker\Generator;
use TeachMe\Entities\TicketComment;

class TicketCommentTableSeeder extends BaseSeeder
{
    public function getModel()
    {
        return new TicketComment();
    }

    public function getDummyData(Generator $faker, array $customValues = array())
    {
        return [
            'comment' => $faker->paragraph(),
            'link' => $faker->randomElement(['', '', $faker->url]),
            'user_id' => $this->getRandom('User')->id,
            'ticket_id' => $this->getRandom('Ticket')->id,
        ];
    }
}
