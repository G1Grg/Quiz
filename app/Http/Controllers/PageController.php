<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\QuizQuestion;
use App\Models\SubCategory;
use App\Models\QuestionOption;
use App\Models\QuizTaken;
use App\Models\QuizTakenQuestion;
use App\Models\UserQuiz;
use App\Models\Contact;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;

class PageController extends Controller
{

    public function homePage()
    {
        return view("home");
    }
    

    public function categoriesPage()
    {
        $categories = Category::all();
        
        return view("categories", array(
            'categories' => $categories,
        ));
    }

     public function aboutUs()
    {
        return view("about-us");
    }
     public function contactUs()
    {
        return view("contact-us");
    }

    public function saveContactUs(Request $request)
    {
        $contactForm = new Contact();

        $contactForm->name = $request->name;
        $contactForm->email = $request->email;
        $contactForm->phone = $request->phone;
        $contactForm->message = $request->message;
        $contactForm->save();

        return redirect()->route("success");

    }

    public function success()
    {
        return view("success");
    }
    public function loginPage()
    {
        return view("login-page");
    }

    public function registerPage()
    {
        return view("register-page");
    }

    public function insideCategory($category)
    {
        $category = Category::where("name", $category)->firstOrFail();

        if ($category) {
            $subcategories = $category->subcategories;
        }
        // dd($subcategories);
        return view("sub-categories", array(
            'category' => $category->name,
            'subcategories' => $subcategories,
        ));
    }

    public function insideSubCategory($category, $subcategory)
    {
        $subcategory = SubCategory::where('name', $subcategory)->first();
        $quizQuestions = QuizQuestion::where('sub_category_id', $subcategory->id)
            ->where("user_quiz_id", NULL)
            ->inRandomOrder()
            ->with("questionoptions")
            ->take(15)
            ->get();
        return view("start-quiz", array(
            'quizQuestions' => $quizQuestions,
            'subcategoryName' => $subcategory->name,
            'subcategoryId' => $subcategory->id,
        ));
    }

    public function getQuestion($subcategoryId)
    {
        $quizQuestion = QuizQuestion::where('sub_category_id', $subcategoryId)
            ->with("questionoptions")
            ->first();

        return response()->json($quizQuestion);
    }

    public function submitQuiz(Request $request)
    {
        // dd($request->all());
        $requestArray = $request->all();
        // dd($requestArray);
        $total_points = 0;
        foreach ($requestArray as $question_id => $userAnswer) {
            // dd($key);
            $correctOption = QuestionOption::where('quiz_question_id', $question_id)
                ->where("is_correct", 1)
                ->first();
            // var_dump($userAnswer);
            // var_dump($correctOption->option);
            // die();
            if ($correctOption) {
                if (rtrim($userAnswer) == rtrim($correctOption->option)) {
                    $total_points = $total_points + 10;
                }
            }
        }
        $quizTaken = new QuizTaken();
        $quizTaken->unique_id = Str::random(40);
        $quizTaken->user_id = Auth::user()->id;
        $quizTaken->total_points = $total_points;
        $quizTaken->save();

        foreach ($requestArray as $question_id => $userAnswer) {
            $correctOption = QuestionOption::where('quiz_question_id', $question_id)
                ->where("is_correct", 1)
                ->first();
            if ($correctOption) {
                $quizTakenAnswer = new QuizTakenQuestion();
                $quizTakenAnswer->quiz_taken_id = $quizTaken->id;
                $quizTakenAnswer->quiz_question_id = $question_id;
                $quizTakenAnswer->given_answer = $userAnswer;
                $quizTakenAnswer->correct_answer = $correctOption->option;
                $quizTakenAnswer->save();
            }
        }
        return redirect()->route("myQuizes");
    }

    public function myQuizes()
    {
        $quizesTaken = QuizTaken::where('user_id', Auth::user()->id)->orderBy("id", "DESC")->get();
        // dd($quizesTaken);
        $quizCount = $quizesTaken->count();
        return view("my-quizes", array(
            'quizCount' => $quizCount,
            'quizesTaken' => $quizesTaken,
        ));
    }

    public function createQuizQuestion()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        return view("create-quiz", array(
            'categories' => $categories,
            'subcategories' => $subcategories,
        ));
    }

    public function createQuizQuestionSave(Request $request)
    {
        $unique_id = Str::random(8);
        $userQuiz = new UserQuiz();
        $userQuiz->unique_id = $unique_id;
        $userQuiz->user_id = Auth::user()->id;
        $userQuiz->save();

        $question = new QuizQuestion();
        $question->sub_category_id = $request->subcategory_id;
        $question->question = $request->question1;
        $question->user_quiz_id = $userQuiz->id;
        $question->save();

        $question = new QuizQuestion();
        $question->sub_category_id = $request->subcategory_id;
        $question->question = $request->question2;
        $question->user_quiz_id = $userQuiz->id;
        $question->save();

        $question = new QuizQuestion();
        $question->sub_category_id = $request->subcategory_id;
        $question->question = $request->question3;
        $question->user_quiz_id = $userQuiz->id;
        $question->save();

        $question = new QuizQuestion();
        $question->sub_category_id = $request->subcategory_id;
        $question->question = $request->question4;
        $question->user_quiz_id = $userQuiz->id;
        $question->save();

        $question = new QuizQuestion();
        $question->sub_category_id = $request->subcategory_id;
        $question->question = $request->question5;
        $question->user_quiz_id = $userQuiz->id;
        $question->save();

        $question = new QuizQuestion();
        $question->sub_category_id = $request->subcategory_id;
        $question->question = $request->question6;
        $question->user_quiz_id = $userQuiz->id;
        $question->save();

        $question = new QuizQuestion();
        $question->sub_category_id = $request->subcategory_id;
        $question->question = $request->question7;
        $question->user_quiz_id = $userQuiz->id;
        $question->save();

        $question = new QuizQuestion();
        $question->sub_category_id = $request->subcategory_id;
        $question->question = $request->question8;
        $question->user_quiz_id = $userQuiz->id;
        $question->save();

        $question = new QuizQuestion();
        $question->sub_category_id = $request->subcategory_id;
        $question->question = $request->question9;
        $question->user_quiz_id = $userQuiz->id;
        $question->save();

        $question = new QuizQuestion();
        $question->sub_category_id = $request->subcategory_id;
        $question->question = $request->question10;
        $question->user_quiz_id = $userQuiz->id;
        $question->save();

        $question = new QuizQuestion();
        $question->sub_category_id = $request->subcategory_id;
        $question->question = $request->question11;
        $question->user_quiz_id = $userQuiz->id;
        $question->save();

        $question = new QuizQuestion();
        $question->sub_category_id = $request->subcategory_id;
        $question->question = $request->question12;
        $question->user_quiz_id = $userQuiz->id;
        $question->save();

        $question = new QuizQuestion();
        $question->sub_category_id = $request->subcategory_id;
        $question->question = $request->question13;
        $question->user_quiz_id = $userQuiz->id;
        $question->save();

        $question = new QuizQuestion();
        $question->sub_category_id = $request->subcategory_id;
        $question->question = $request->question14;
        $question->user_quiz_id = $userQuiz->id;
        $question->save();

        $question = new QuizQuestion();
        $question->sub_category_id = $request->subcategory_id;
        $question->question = $request->question15;
        $question->user_quiz_id = $userQuiz->id;
        $question->save();

        return redirect()->route("createQuizQuestionOptions", $unique_id);
    }

    public function createQuizQuestionOptions($unique_id)
    {
        $userQuiz = UserQuiz::where("unique_id", $unique_id)->first();
        // dd($userQuiz);
         // $questions = QuizQuestion::where("user_quiz_id", $userQuiz->id)->get();

         $questions = QuizQuestion::where("user_quiz_id", $userQuiz->id)
                    ->with(['questionoptions'])
                    ->get();
        // dd($questions);
        return view("create-quiz-option", array(
            "unique_id" => $unique_id,
            'questions' => $questions,
        ));
    }

    public function saveQuestionOption(Request $request)
    {
        $question = QuizQuestion::where('id', $request->question_id)->first();

        if ($request->option1) {
            $questionOption = new QuestionOption();
            $questionOption->quiz_question_id = $question->id;
            $questionOption->option = $request->option1;
            $questionOption->is_correct = $request->is_correct1;
            $questionOption->save();
        }

        if ($request->option2) {
            $questionOption = new QuestionOption();
            $questionOption->quiz_question_id = $question->id;
            $questionOption->option = $request->option2;
            $questionOption->is_correct = $request->is_correct2;
            $questionOption->save();
        }

        if ($request->option3) {
            $questionOption = new QuestionOption();
            $questionOption->quiz_question_id = $question->id;
            $questionOption->option = $request->option3;
            $questionOption->is_correct = $request->is_correct3;
            $questionOption->save();
        }

        if ($request->option4) {
            $questionOption = new QuestionOption();
            $questionOption->quiz_question_id = $question->id;
            $questionOption->option = $request->option4;
            $questionOption->is_correct = $request->is_correct4;
            $questionOption->save();
        }

        return redirect()->back();
    }

    public function showQuizesICreated()
    {
        $quizes = UserQuiz::where("user_id", Auth::user()->id)->get();

        return view("quizes-i-created", array(
            'quizes' => $quizes,
        ));
    }

    public function playCustomQuizGet()
    {
        return view("enter-code", array(
            'not_valid' => false,
        ));
    }
    
    public function playCustomQuizPost(Request $request)
    {
        $userQuiz = UserQuiz::where("unique_id", $request->play_code)->first();
        // dd($userQuiz);
            if ($userQuiz) {
                $quizQuestions = QuizQuestion::where("user_quiz_id", $userQuiz->id)
                ->inRandomOrder()
                ->with("questionoptions")
                ->get();

                return view("start-custom-quiz", array(
                    'quizQuestions' => $quizQuestions,
                ));
        }

        $not_valid = true;
        return view("enter-code", array(
            'not_valid' => $not_valid,
        ));
    }

    public function addCategory (Request $request){
        $rules = [ 'name'=>'required|string|min:3|max:255',
    ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return redirect ('categories')
            ->withInput()
            ->withErrors($validator);
        } 
        else {
            $data  = $request->input();
            try{
                 $category = new addCategory();
                 $category->name =$data['name'];
                 $category->save();
                 return redirect ('categories')->with('status', "insert Successfully");
                }
                catch(Exception $e){
                 return redirect ('categories')->with ('status', "insert failed");
        }
    }}
}
