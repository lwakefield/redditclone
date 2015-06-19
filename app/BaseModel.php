<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Exceptions\ValidationException;

use Input;
use Validator;

abstract class BaseModel extends Model
{

    use Traits\Models\Booter;

    public static function boot()
    {
        parent::boot();

        static::saving(function (BaseModel $model) {
            $model->populate();
            $model->validate();
        });
    }

    public function populate()
    {
        foreach (Input::all() as $key => $val) {
            if (in_array($key, $this->fillable)) {
                $this->setAttribute($key, $val);
            }
        }
    }

    public function validate()
    {
        if (isset($this->rules)) {
            $validator = Validator::make($this->getAttributes(), $this->rules);
            if ($validator->fails()) {
                throw new ValidationException('Error validating model', $validator->errors());
            }
        }
    }
}
