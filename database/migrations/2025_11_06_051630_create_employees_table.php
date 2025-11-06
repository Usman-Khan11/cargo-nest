<?php

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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('code', 30);
            $table->string('name', 100);
            $table->string('gender', 10)->nullable();
            $table->date('dob')->nullable();
            $table->string('father_name', 100)->nullable();
            $table->string('maritel_status', 50)->nullable();
            $table->string('blood_group', 20)->nullable();
            $table->string('mother_name', 100)->nullable();
            $table->string('tax_no', 100)->nullable();
            $table->string('nationality', 50)->nullable();
            $table->string('qualification', 50)->nullable();
            $table->string('work_experience', 50)->nullable();
            $table->string('cnic', 20)->nullable();
            $table->date('cnic_issue')->nullable();
            $table->date('cnic_expiry')->nullable();
            $table->string('health_issue', 200)->nullable();

            $table->string('official_email', 200)->nullable();
            $table->string('personal_email', 200)->nullable();
            $table->string('country', 50)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('state', 50)->nullable();
            $table->string('address', 250)->nullable();
            $table->string('zip', 50)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('cell_phone', 20)->nullable();
            $table->string('alt_phone', 20)->nullable();
            $table->string('cost_center', 50)->nullable();

            $table->string('payment_mode', 20)->nullable();
            $table->string('bank_name', 100)->nullable();
            $table->string('branch_name', 100)->nullable();
            $table->string('account_title', 100)->nullable();
            $table->string('account_number', 100)->nullable();

            $table->decimal('last_salary', 10, 2)->default(0);
            $table->date('joining_date')->nullable();
            $table->boolean('salary_account')->default(false);
            $table->string('job_status', 30)->nullable();
            $table->string('salary_policy', 50)->nullable();
            $table->string('job_type', 50)->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('designation_id')->nullable();
            $table->unsignedBigInteger('line_manager_id')->nullable();
            $table->unsignedBigInteger('immediate_manager_id')->nullable();
            $table->unsignedBigInteger('immediate_manager_2_id')->nullable();
            $table->unsignedBigInteger('immediate_manager_3_id')->nullable();
            $table->decimal('basic_salary', 10, 2)->default(0);
            $table->decimal('overtime_hourly_rate', 10, 2)->default(0);
            $table->decimal('fixed_hourly_rate', 10, 2)->default(0);
            $table->decimal('fixed_sunday_hourly_rate', 10, 2)->default(0);
            $table->decimal('eobi', 10, 2)->default(0);
            $table->decimal('bonus', 10, 2)->default(0);
            $table->integer('bonus_duration_month')->default(0);
            $table->text('limit_company')->nullable();
            $table->boolean('is_attendance_punching_enabled')->default(false);
            $table->string('employee_shift', 30)->nullable();

            $table->string('image', 150)->nullable();
            $table->string('resume', 150)->nullable();
            $table->string('offer_letter', 150)->nullable();
            $table->string('joining_letter', 150)->nullable();
            $table->string('appointment_letter', 150)->nullable();
            $table->string('contract_paper', 150)->nullable();
            $table->string('id_front', 150)->nullable();
            $table->string('id_back', 150)->nullable();
            $table->string('character_certificate', 150)->nullable();
            $table->string('education_doc_16_years', 150)->nullable();
            $table->string('education_doc_14_years', 150)->nullable();
            $table->string('education_doc_other', 150)->nullable();
            $table->string('education_doc_other_2', 150)->nullable();

            $table->text('rep')->nullable();
            $table->text('reference')->nullable();
            $table->text('dependant')->nullable();
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
        Schema::dropIfExists('employees');
    }
};
