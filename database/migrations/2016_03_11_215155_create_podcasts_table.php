            $table->engine = 'MYISAM';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreatePodcastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('podcasts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('feed', 4096)
                  ->nullable();
            $table->string('title')
                  ->nullable();
            $table->string('website')
                  ->nullable();
            $table->text('description')
                  ->nullable();
            $table->text('language', 5)
                  ->nullable();
            $table->text('copyright', 64)
                  ->nullable();
            $table->text('generator', 64)
                  ->nullable();
            $table->timestamp('lastbuilddate');
            $table->timestamp('lastsync');
            $table->timestamps();
            $table->integer('catalog_id')
                  ->unsigned();
            $table->foreign('catalog_id')
                  ->references('id')
                  ->on('catalogs')
                  ->onDelete('cascade');
            $table->engine = 'MYISAM';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('podcasts', function (Blueprint $table) {
            $table->dropForeign('podcasts_catalog_id_foreign');
        });
        Schema::drop('podcasts');
    }
}