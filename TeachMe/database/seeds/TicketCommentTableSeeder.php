<?php

use Faker\Generator;
use Styde\Seeder\Seeder;
use TeachMe\Entities\TicketComment;

class TicketCommentTableSeeder extends Seeder
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
            'user_id' => $this->random('User')->id,
            'ticket_id' => $this->random('Ticket')->id,
        ];
    }
}
