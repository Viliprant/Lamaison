<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        // Supprimer toutes les images si elles existent à la racine du dossier "images"
        Storage::disk('local')->delete( Storage::files() );

        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@admin.fr',
                'password' => Hash::make( 'admin' )
            ],
        ]);

        DB::table('categories')->insert([
            [
                'title' => 'Homme',
                'description' => 'Pour les hommes',
            ],
            [
                'title' => 'Femme',
                'description' => 'Pour les femmes',
            ],
        ]);

        factory(App\Product::class, 10)->create()->each(function($product){
            $categories = ['Homme', 'Femme']; // les choix possibles
            // On en choisit un aléatoirement tout en vérifiant qu'il est présent dans la table
            $category = App\Category::where('title', $categories[rand(0,1)])->first();

            //on associe les deux éléments
            $product->category()->associate($category);

            // Puis on demande à sauvegarder cette association

            // 
            // Les images
            // 

            // On vérifie dans quel dossier on doit se placer
            if($product->category->title === 'Homme'){
                $files = array_slice(Storage::files('/hommes'), 1); // le premier élèment est enlevé 'thumb.db"
            }
            else{
                $files = array_slice(Storage::files('/femmes'), 1);
            }

            $newName = Str::random(40) . '.jpg';

            // On choisit aléatoirement une image
            // Puis on la copie à la racine du dossier "images"
            Storage::copy($files[rand(0, count($files) - 1)], $newName );

            $product->url_image = $newName;

            $product->save();
            
        });
    }
    
}
