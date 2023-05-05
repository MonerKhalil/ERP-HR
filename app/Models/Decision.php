<?php

namespace App\Models;

use App\Http\Requests\BaseRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Validation\Rule;

class Decision extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        "type_decision_id","session_decision_id","number","date","content",
        "effect_salary","end_date_decision","value","image","rate",
        "created_by","updated_by","is_active",
    ];

    // Add relationships between tables section

    public function type_decision(){
        return $this->belongsTo(TypeDecision::class,"type_decision_id","id");
    }

    public function session_decision(){
        return $this->belongsTo(SessionDecision::class,"session_decision_id","id");
    }


    /**
     * Description: To check front end validation
     * @inheritDoc
     * @author moner khalil
     */
    public function validationRules(){
        return function (BaseRequest $validator) {
            $rule = !$validator->isUpdatedRequest() ? "required" : "sometimes";
            return [
                "type_decision_id" => [$rule, Rule::exists("type_decisions","id")],
                "session_decision_id" => [$rule, Rule::exists("session_decisions","id")],
                "effect_salary" => [$rule, Rule::in(self::effectSalary())],
                "date" => $validator->afterDateOrNowRules($rule === 'required'),
                "content" => $validator->textRule($rule === 'required'),
                "end_date_decision" => $validator->afterDateOrNowRules(false,'date'),
                "value" => ["nullable","numeric","min:1"],
                "rate" => ["nullable","numeric","min:1"],
                "image" => $validator->imageRule(false),
            ];
        };
    }

    public static function effectSalary(){
        return ["increment","decrement","none"];
    }
}
