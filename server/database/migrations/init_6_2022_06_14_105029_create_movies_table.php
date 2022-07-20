<?php

use App\Models\Status;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title',120)->unique();
            //Maybe use 'text' ??
            $table->string('description',1000);
            $table->string('link')->nullable();
            $table->foreignId('status_id')->default(Status::DRAFT_ID)->constrained();
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('approver_id')->nullable();

            $table->foreign('approver_id')->references('id')->on("users");
            $table->foreign('author_id')->references('id')->on('users');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
};
