<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->call('EventsTableSeeder');
		$this->command->info('CommunityEvents table seeded!');
	}

}


class EventsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('CommunityEvents')->delete();
        // $event = new Event;

        $events = array(
        	array(
	        	'title' 		=> 'Test Event Title',
	        	'type' 			=> '',
	        	'location' 		=> 'Test Location',
	        	'start' 		=> '2013-12-25 14:00:00',
	        	'end' 			=> '2013-12-25 16:00:00',
	        	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, blanditiis, non possimus ullam officiis debitis et. Quia, possimus quam autem unde laborum obcaecati officia ipsa reiciendis soluta veritatis reprehenderit aperiam!'
	        ),
        	array(
	        	'title' 		=> 'Test Event Title',
	        	'type' 			=> '',
	        	'location' 		=> 'Test Location',
	        	'start' 		=> '2013-12-25 13:00:00',
	        	'end' 			=> '2013-12-25 15:00:00',
	        	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, blanditiis, non possimus ullam officiis debitis et. Quia, possimus quam autem unde laborum obcaecati officia ipsa reiciendis soluta veritatis reprehenderit aperiam!'
	        ),

        	array(
	        	'title' 		=> 'Test Event Title',
	        	'type' 			=> '',
	        	'location' 		=> 'Test Location',
	        	'start' 		=> '2013-12-25 10:00:00',
	        	'end' 			=> '2013-12-25 11:00:00',
	        	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, blanditiis, non possimus ullam officiis debitis et. Quia, possimus quam autem unde laborum obcaecati officia ipsa reiciendis soluta veritatis reprehenderit aperiam!'
	        ),
        	array(
	        	'title' 		=> 'Flames vs. Oilers',
	        	'type' 			=> '1',
	        	'location' 		=> 'Rexall Place',
	        	'start' 		=> '2013-12-26 19:00:00',
	        	'end' 			=> '2013-12-26 21:00:00',
	        	'description' 	=> ''
	        ),
        	array(
	        	'title' 		=> 'Test Event Title',
	        	'type' 			=> '',
	        	'location' 		=> 'Test Location',
	        	'start' 		=> '2013-12-26 13:00:00',
	        	'end' 			=> '2013-12-26 15:00:00',
	        	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, blanditiis, non possimus ullam officiis debitis et. Quia, possimus quam autem unde laborum obcaecati officia ipsa reiciendis soluta veritatis reprehenderit aperiam!'
	        ),

        	array(
	        	'title' 		=> 'Test Event Title',
	        	'type' 			=> '',
	        	'location' 		=> 'Test Location',
	        	'start' 		=> '2013-12-26 10:00:00',
	        	'end' 			=> '2013-12-26 11:00:00',
	        	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, blanditiis, non possimus ullam officiis debitis et. Quia, possimus quam autem unde laborum obcaecati officia ipsa reiciendis soluta veritatis reprehenderit aperiam!'
	        ),

        	array(
	        	'title' 		=> 'Test Event Title',
	        	'type' 			=> '',
	        	'location' 		=> 'Test Location',
	        	'start' 		=> '2013-12-31 10:00:00',
	        	'end' 			=> '2013-12-31 11:00:00',
	        	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, blanditiis, non possimus ullam officiis debitis et. Quia, possimus quam autem unde laborum obcaecati officia ipsa reiciendis soluta veritatis reprehenderit aperiam!'
	        ),
			array(
	        	'title' 		=> 'Test Event Title',
	        	'type' 			=> '',
	        	'location' 		=> 'Test Location',
	        	'start' 		=> '2013-12-31 13:00:00',
	        	'end' 			=> '2013-12-31 15:00:00',
	        	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, blanditiis, non possimus ullam officiis debitis et. Quia, possimus quam autem unde laborum obcaecati officia ipsa reiciendis soluta veritatis reprehenderit aperiam!'
	        ),

        	array(
	        	'title' 		=> 'Test Event Title',
	        	'type' 			=> '',
	        	'location' 		=> 'Test Location',
	        	'start' 		=> '2013-12-26 10:00:00',
	        	'end' 			=> '2013-12-26 11:00:00',
	        	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, blanditiis, non possimus ullam officiis debitis et. Quia, possimus quam autem unde laborum obcaecati officia ipsa reiciendis soluta veritatis reprehenderit aperiam!'
	        ),	        
        	array(
	        	'title' 		=> 'Test Event Title',
	        	'type' 			=> '',
	        	'location' 		=> 'Test Location',
	        	'start' 		=> '2013-12-31 14:00:00',
	        	'end' 			=> '2013-12-31 16:00:00',
	        	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, blanditiis, non possimus ullam officiis debitis et. Quia, possimus quam autem unde laborum obcaecati officia ipsa reiciendis soluta veritatis reprehenderit aperiam!'
	        ),	   
			array(
	        	'title' 		=> 'Test Event Title',
	        	'type' 			=> '',
	        	'location' 		=> 'Test Location',
	        	'start' 		=> '2014-01-01 13:00:00',
	        	'end' 			=> '2014-01-01 15:00:00',
	        	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, blanditiis, non possimus ullam officiis debitis et. Quia, possimus quam autem unde laborum obcaecati officia ipsa reiciendis soluta veritatis reprehenderit aperiam!'
	        ),

        	array(
	        	'title' 		=> 'Test Event Title',
	        	'type' 			=> '',
	        	'location' 		=> 'Test Location',
	        	'start' 		=> '2014-01-01 10:00:00',
	        	'end' 			=> '2014-01-01 11:00:00',
	        	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, blanditiis, non possimus ullam officiis debitis et. Quia, possimus quam autem unde laborum obcaecati officia ipsa reiciendis soluta veritatis reprehenderit aperiam!'
	        ),	        
        	array(
	        	'title' 		=> 'Test Event Title',
	        	'type' 			=> '',
	        	'location' 		=> 'Test Location',
	        	'start' 		=> '2014-01-01 14:00:00',
	        	'end' 			=> '2014-01-01 16:00:00',
	        	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, blanditiis, non possimus ullam officiis debitis et. Quia, possimus quam autem unde laborum obcaecati officia ipsa reiciendis soluta veritatis reprehenderit aperiam!'
	        ),	 
			array(
	        	'title' 		=> 'Test Event Title',
	        	'type' 			=> '',
	        	'location' 		=> 'Test Location',
	        	'start' 		=> '2014-01-01 13:00:00',
	        	'end' 			=> '2014-01-01 15:00:00',
	        	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, blanditiis, non possimus ullam officiis debitis et. Quia, possimus quam autem unde laborum obcaecati officia ipsa reiciendis soluta veritatis reprehenderit aperiam!'
	        ),

        	array(
	        	'title' 		=> 'Test Event Title',
	        	'type' 			=> '',
	        	'location' 		=> 'Test Location',
	        	'start' 		=> '2014-01-01 10:00:00',
	        	'end' 			=> '2014-01-01 11:00:00',
	        	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, blanditiis, non possimus ullam officiis debitis et. Quia, possimus quam autem unde laborum obcaecati officia ipsa reiciendis soluta veritatis reprehenderit aperiam!'
	        ),	        
        	array(
	        	'title' 		=> 'Test Event Title',
	        	'type' 			=> '',
	        	'location' 		=> 'Test Location',
	        	'start' 		=> '2014-01-01 14:00:00',
	        	'end' 			=> '2014-01-01 16:00:00',
	        	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, blanditiis, non possimus ullam officiis debitis et. Quia, possimus quam autem unde laborum obcaecati officia ipsa reiciendis soluta veritatis reprehenderit aperiam!'
	        ),	 
			array(
	        	'title' 		=> 'Test Event Title',
	        	'type' 			=> '',
	        	'location' 		=> 'Test Location',
	        	'start' 		=> '2014-01-01 13:00:00',
	        	'end' 			=> '2014-01-01 15:00:00',
	        	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, blanditiis, non possimus ullam officiis debitis et. Quia, possimus quam autem unde laborum obcaecati officia ipsa reiciendis soluta veritatis reprehenderit aperiam!'
	        ),

        	array(
	        	'title' 		=> 'Test Event Title',
	        	'type' 			=> '',
	        	'location' 		=> 'Test Location',
	        	'start' 		=> '2014-01-01 10:00:00',
	        	'end' 			=> '2014-01-01 11:00:00',
	        	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, blanditiis, non possimus ullam officiis debitis et. Quia, possimus quam autem unde laborum obcaecati officia ipsa reiciendis soluta veritatis reprehenderit aperiam!'
	        ),	        
        	array(
	        	'title' 		=> 'Test Event Title',
	        	'type' 			=> '',
	        	'location' 		=> 'Test Location',
	        	'start' 		=> '2014-01-01 14:00:00',
	        	'end' 			=> '2014-01-01 16:00:00',
	        	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, blanditiis, non possimus ullam officiis debitis et. Quia, possimus quam autem unde laborum obcaecati officia ipsa reiciendis soluta veritatis reprehenderit aperiam!'
	        ),	 
			array(
	        	'title' 		=> 'Test Event Title',
	        	'type' 			=> '',
	        	'location' 		=> 'Test Location',
	        	'start' 		=> '2014-01-06 13:00:00',
	        	'end' 			=> '2014-01-06 15:00:00',
	        	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, blanditiis, non possimus ullam officiis debitis et. Quia, possimus quam autem unde laborum obcaecati officia ipsa reiciendis soluta veritatis reprehenderit aperiam!'
	        ),

        	array(
	        	'title' 		=> 'Test Event Title',
	        	'type' 			=> '',
	        	'location' 		=> 'Test Location',
	        	'start' 		=> '2014-01-06 10:00:00',
	        	'end' 			=> '2014-01-06 11:00:00',
	        	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, blanditiis, non possimus ullam officiis debitis et. Quia, possimus quam autem unde laborum obcaecati officia ipsa reiciendis soluta veritatis reprehenderit aperiam!'
	        ),	        
        	array(
	        	'title' 		=> 'Test Event Title',
	        	'type' 			=> '',
	        	'location' 		=> 'Test Location',
	        	'start' 		=> '2014-01-06 14:00:00',
	        	'end' 			=> '2014-01-06 16:00:00',
	        	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, blanditiis, non possimus ullam officiis debitis et. Quia, possimus quam autem unde laborum obcaecati officia ipsa reiciendis soluta veritatis reprehenderit aperiam!'
	        ),	 	
        	array(
	        	'title' 		=> 'Test Event Title',
	        	'type' 			=> '',
	        	'location' 		=> 'Test Location',
	        	'start' 		=> '2014-01-12 14:00:00',
	        	'end' 			=> '2014-01-12 16:00:00',
	        	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, blanditiis, non possimus ullam officiis debitis et. Quia, possimus quam autem unde laborum obcaecati officia ipsa reiciendis soluta veritatis reprehenderit aperiam!'
	        ),	 
			array(
	        	'title' 		=> 'Test Event Title',
	        	'type' 			=> '',
	        	'location' 		=> 'Test Location',
	        	'start' 		=> '2014-01-12 13:00:00',
	        	'end' 			=> '2014-01-12 15:00:00',
	        	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, blanditiis, non possimus ullam officiis debitis et. Quia, possimus quam autem unde laborum obcaecati officia ipsa reiciendis soluta veritatis reprehenderit aperiam!'
	        ),

        	array(
	        	'title' 		=> 'Test Event Title',
	        	'type' 			=> '',
	        	'location' 		=> 'Test Location',
	        	'start' 		=> '2014-01-12 10:00:00',
	        	'end' 			=> '2014-01-12 11:00:00',
	        	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, blanditiis, non possimus ullam officiis debitis et. Quia, possimus quam autem unde laborum obcaecati officia ipsa reiciendis soluta veritatis reprehenderit aperiam!'
	        ),	        
        	array(
	        	'title' 		=> 'Test Event Title',
	        	'type' 			=> '',
	        	'location' 		=> 'Test Location',
	        	'start' 		=> '2014-01-12 14:00:00',
	        	'end' 			=> '2014-01-12 16:00:00',
	        	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, blanditiis, non possimus ullam officiis debitis et. Quia, possimus quam autem unde laborum obcaecati officia ipsa reiciendis soluta veritatis reprehenderit aperiam!'
	        ),	 
        	array(
	        	'title' 		=> 'Test Event Title',
	        	'type' 			=> '',
	        	'location' 		=> 'Test Location',
	        	'start' 		=> '2014-01-11 10:00:00',
	        	'end' 			=> '2014-01-11 11:00:00',
	        	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, blanditiis, non possimus ullam officiis debitis et. Quia, possimus quam autem unde laborum obcaecati officia ipsa reiciendis soluta veritatis reprehenderit aperiam!'
	        ),	        
        	array(
	        	'title' 		=> 'Test Event Title',
	        	'type' 			=> '',
	        	'location' 		=> 'Test Location',
	        	'start' 		=> '2014-01-11 14:00:00',
	        	'end' 			=> '2014-01-11 16:00:00',
	        	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, blanditiis, non possimus ullam officiis debitis et. Quia, possimus quam autem unde laborum obcaecati officia ipsa reiciendis soluta veritatis reprehenderit aperiam!'
	        ),
			array(
	        	'title' 		=> 'Test Event Title',
	        	'type' 			=> '',
	        	'location' 		=> 'Test Location',
	        	'start' 		=> '2014-01-12 13:00:00',
	        	'end' 			=> '2014-01-12 15:00:00',
	        	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, blanditiis, non possimus ullam officiis debitis et. Quia, possimus quam autem unde laborum obcaecati officia ipsa reiciendis soluta veritatis reprehenderit aperiam!'
	        ),

        	array(
	        	'title' 		=> 'Test Event Title',
	        	'type' 			=> '',
	        	'location' 		=> 'Test Location',
	        	'start' 		=> '2014-01-12 10:00:00',
	        	'end' 			=> '2014-01-12 11:00:00',
	        	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, blanditiis, non possimus ullam officiis debitis et. Quia, possimus quam autem unde laborum obcaecati officia ipsa reiciendis soluta veritatis reprehenderit aperiam!'
	        ),	        
        	array(
	        	'title' 		=> 'Test Event Title',
	        	'type' 			=> '',
	        	'location' 		=> 'Test Location',
	        	'start' 		=> '2014-01-12 14:00:00',
	        	'end' 			=> '2014-01-12 16:00:00',
	        	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, blanditiis, non possimus ullam officiis debitis et. Quia, possimus quam autem unde laborum obcaecati officia ipsa reiciendis soluta veritatis reprehenderit aperiam!'
	        ),	 
        	array(
	        	'title' 		=> 'Test Event Title',
	        	'type' 			=> '',
	        	'location' 		=> 'Test Location',
	        	'start' 		=> '2014-01-11 10:00:00',
	        	'end' 			=> '2014-01-11 11:00:00',
	        	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, blanditiis, non possimus ullam officiis debitis et. Quia, possimus quam autem unde laborum obcaecati officia ipsa reiciendis soluta veritatis reprehenderit aperiam!'
	        ),	        
        	array(
	        	'title' 		=> 'Test Event Title',
	        	'type' 			=> '',
	        	'location' 		=> 'Test Location',
	        	'start' 		=> '2014-01-11 14:00:00',
	        	'end' 			=> '2014-01-11 16:00:00',
	        	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, blanditiis, non possimus ullam officiis debitis et. Quia, possimus quam autem unde laborum obcaecati officia ipsa reiciendis soluta veritatis reprehenderit aperiam!'
	        ),	
		);

        foreach ($events as $event) {
        	DB::table('CommunityEvents')->insert($event);
        }

    }

}
