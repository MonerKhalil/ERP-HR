@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--AddCoursePage">
        <div class="AddCoursePage">
            <div class="AddCoursePage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => __('RegisterEmployeeCourse') ,
                    'paths' => [['Courses' , '#'] , ['New Course']] ,
                    'summery' => __('RegisterCoursesPage')
                ])
            </div>
        </div>
        <div class="AddCoursePagePrim__Content">
            <div class="Row">
                <div class="AddCoursePage__Form">
                    <div class="Container--MainContent">
                        <div class="Row">
                            <div class="CoursePage__Information">
                                <div class="Card">
                                    <div class="Card__Content">
                                        <div class="Card__Inner">
                                            <div class="Card__Header">
                                                <div class="Card__Title">
                                                    <h3>@lang("CourseInfo")</h3>
                                                </div>
                                            </div>
                                            <form class="Form Form--Dark">
                                                <div class="Row GapC-1-5">
                                                    <div class="Col-4-md Col-6-sm">
                                                        <div class="Form__Group">
                                                            <div class="Form__Select">
                                                                <div class="Select__Area">
                                                                    @include("System.Components.selector" , ['Name' => "employeeName" , "Required" => "true" , "Label" => __('employeeName'),"DefaultValue" => "",
                                                                                "OptionsValues" => [("Test1"), ("Test2")],])
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="Col-4-md Col-6-sm">
                                                        <div class="Form__Group">
                                                            <div class="Form__Input">
                                                                <div class="Input__Area">
                                                                    <input id="courseName"
                                                                           class="Input__Field"
                                                                           type="text"
                                                                           name="courseName"
                                                                           placeholder="@lang("courseName")">
                                                                    <label class="Input__Label"
                                                                           for="courseName">@lang("courseName")</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="Col-4-md Col-6-sm">
                                                        <div class="Form__Group">
                                                            <div class="Form__Date">
                                                                <div class="Date__Area">
                                                                    <input id="courseStartDate"
                                                                           class="Date__Field"
                                                                           type="text"
                                                                           name="courseStartDate"
                                                                           placeholder="@lang("courseStartDate")">
                                                                    <label class="Date__Label"
                                                                           for="courseStartDate">@lang("courseStartDate")</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="Col-4-md Col-6-sm">
                                                        <div class="Form__Group">
                                                            <div class="Form__Date">
                                                                <div class="Date__Area">
                                                                    <input id="courseEndDate"
                                                                           class="Date__Field"
                                                                           type="text"
                                                                           name="courseEndDate"
                                                                           placeholder="@lang("courseEndDate")">
                                                                    <label class="Date__Label"
                                                                           for="courseEndDate">@lang("courseEndDate")</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="Col-4-md Col-6-sm">
                                                        <div class="Form__Group">
                                                            <div class="Form__Input">
                                                                <div class="Input__Area">
                                                                    <input id="heldPlace"
                                                                           class="Input__Field"
                                                                           type="text"
                                                                           name="heldPlace"
                                                                           placeholder="@lang("heldPlace")">
                                                                    <label class="Input__Label"
                                                                           for="heldPlace">@lang("heldPlace")</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="Col-4-md Col-6-sm">
                                                        <div class="Form__Group">
                                                            <div class="Form__Input">
                                                                <div class="Input__Area">
                                                                    <input id="courseSalaryImpact"
                                                                           class="Input__Field"
                                                                           type="number"
                                                                           name="courseSalaryImpact"
                                                                           placeholder="@lang("salaryImpact")">
                                                                    <label class="Input__Label"
                                                                           for="courseSalaryImpact">@lang("salaryImpact")</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="Col-4-md Col-6-sm">
                                                        <div class="Form__Group">
                                                            <div class="Form__Input">
                                                                <div class="Input__Area">
                                                                    <input id="courseProvider"
                                                                           class="Input__Field"
                                                                           type="text"
                                                                           name="courseProvider"
                                                                           placeholder="@lang("courseProvider")">
                                                                    <label class="Input__Label"
                                                                           for="courseProvider">@lang("courseProvider")</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="Col-12-xs">
                                                        <div class="Form__Group">
                                                            <div class="Form__Button">
                                                                <button class="Button Send"
                                                                        type="submit">@lang("saveCourse")</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
