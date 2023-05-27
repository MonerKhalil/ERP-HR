<!doctype html>
@if(app()->getLocale()==="en")
    <html lang="en" dir="ltr">
@else
    <html lang="ar" dir="rtl">
@endif

        <head>
            {{-- Title Page System --}}
            <title>HR System</title>
            {{-- Logo System --}}
            <link rel="icon" href="{{asset('System/Assets/Images/Logo.png')}}">
            {{-- Icons System --}}
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
                  rel="stylesheet">
            {{-- Normalize System --}}
            <link rel="stylesheet" href='{{asset('System/Assets/CSS/Normalize.css')}}' type="text/css" />
            {{-- Libraries System --}}
            <link rel="stylesheet" href='{{asset('System/Assets/Lib/Libraries.css')}}' type="text/css" />
            {{-- Main CSS System --}}
            <link rel="stylesheet" href='{{asset('System/Assets/CSS/Style.css')}}' type="text/css" />
            {{-- CSS Extra--}}
            <style>

                /* Custom CSS */

                .FooterPage .RowFooter{
                    display: flex;
                    justify-content: space-between;
                    align-content: center;
                }

            </style>

        </head>

        <body>
            <div id="Wrapper">
                {{--  Main Content  --}}
                <main class="MainContent">
                    <section class="MainContent__Section MainContent__Section--Print">
                        <div class="PrintPage">
                            <div class="PrintPage__Content">
                                <div class="Container--MainContent">
                                    <div class="Row">
                                        <div class="Col">
                                            <div class="Card">
                                                <div class="PrintPage__CompanyInfo">
                                                    <div class="ImageCompany">
                                                        <img src="{{asset("System/Assets/Images/Logo.png")}}"
                                                             alt="Company Image" />
                                                    </div>
                                                    <div class="DescriptionCompany">
                                                        <div class="Text">
                                                            <div class="CompanyName">@lang("company") : ERP Epic</div>
                                                            <div class="Address">@lang("address") : @lang("damascus")</div>
                                                            <div class="Telephone">@lang("tel") : 123123123</div>
                                                            <div class="Email">@lang("email") : Amir@Amir.com</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="Col">
                                            <div class="Card">
                                                <div class="Card PrintPage__ReportTable Report">
                                                    <div class="Report__Content">
                                                        <div class="Table">
                                                            <div class="Card__InnerGroup">
                                                                <div class="Card__Inner p0">
                                                                    <div class="Table__ContentTable">
                                                                        <table class="Center Table__Table" >
                                                                            <thead>
                                                                                <tr class="Item HeaderList">
                                                                                <th class="Item__Col">
                                                                                    #
                                                                                </th>
                                                                                <th class="Item__Col">
                                                                                    اسم الموظف
                                                                                </th>
                                                                                <th class="Item__Col">
                                                                                    الجنس
                                                                                </th>
                                                                                <th class="Item__Col">
                                                                                    تاريخ التوظيف
                                                                                </th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody class="GroupRows">
                                                                                <tr class="GroupRows__MainRow Show">
                                                                                    <td class="Item__Col">
                                                                                        1
                                                                                    </td>
                                                                                    <td class="Item__Col">
                                                                                        امير
                                                                                    </td>
                                                                                    <td class="Item__Col">
                                                                                        ذكر
                                                                                    </td>
                                                                                    <td class="Item__Col">
                                                                                        10-10-2010
                                                                                    </td>
                                                                                </tr>
                                                                                <tr class="Left GroupRows__SubRows">
                                                                                    <td class="Item__Col" colspan="4">
                                                                                        <div class="Report__Data">
                                                                                            <div class="ListData NotResponsive">
                                                                                                <div class="ListData__Content">
                                                                                                    <div class="ListData__Item ListData__Item--NoAction">
                                                                                                        <div class="Data_Col">
                                                                                                <span class="Data_Label">
                                                                                                    الدرجة العلمية
                                                                                                </span>
                                                                                                            <span class="Data_Value">
                                                                                                    بكلوريا
                                                                                                </span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="ListData__Item ListData__Item--NoAction">
                                                                                                        <div class="Data_Col">
                                                                                                <span class="Data_Label">
                                                                                                    نوع العقد
                                                                                                </span>
                                                                                                            <span class="Data_Value">
                                                                                                    متدرب
                                                                                                </span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="ListData__Item ListData__Item--NoAction">
                                                                                                        <div class="Data_Col">
                                                                                                <span class="Data_Label">
                                                                                                    الوضع العائلي
                                                                                                </span>
                                                                                                            <span class="Data_Value">
                                                                                                    عازب
                                                                                                </span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                            <tbody class="GroupRows">
                                                                            <tr class="GroupRows__MainRow Show">
                                                                                <td class="Item__Col">
                                                                                    1
                                                                                </td>
                                                                                <td class="Item__Col">
                                                                                    امير
                                                                                </td>
                                                                                <td class="Item__Col">
                                                                                    ذكر
                                                                                </td>
                                                                                <td class="Item__Col">
                                                                                    10-10-2010
                                                                                </td>
                                                                            </tr>
                                                                            <tr class="Left GroupRows__SubRows">
                                                                                <td class="Item__Col" colspan="4">
                                                                                    <div class="Report__Data">
                                                                                        <div class="ListData NotResponsive">
                                                                                            <div class="ListData__Content">
                                                                                                <div class="ListData__Item ListData__Item--NoAction">
                                                                                                    <div class="Data_Col">
                                                                                                <span class="Data_Label">
                                                                                                    الدرجة العلمية
                                                                                                </span>
                                                                                                        <span class="Data_Value">
                                                                                                    بكلوريا
                                                                                                </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="ListData__Item ListData__Item--NoAction">
                                                                                                    <div class="Data_Col">
                                                                                                <span class="Data_Label">
                                                                                                    نوع العقد
                                                                                                </span>
                                                                                                        <span class="Data_Value">
                                                                                                    متدرب
                                                                                                </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="ListData__Item ListData__Item--NoAction">
                                                                                                    <div class="Data_Col">
                                                                                                <span class="Data_Label">
                                                                                                    الوضع العائلي
                                                                                                </span>
                                                                                                        <span class="Data_Value">
                                                                                                    عازب
                                                                                                </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                            <tbody class="GroupRows">
                                                                            <tr class="GroupRows__MainRow Show">
                                                                                <td class="Item__Col">
                                                                                    1
                                                                                </td>
                                                                                <td class="Item__Col">
                                                                                    امير
                                                                                </td>
                                                                                <td class="Item__Col">
                                                                                    ذكر
                                                                                </td>
                                                                                <td class="Item__Col">
                                                                                    10-10-2010
                                                                                </td>
                                                                            </tr>
                                                                            <tr class="Left GroupRows__SubRows">
                                                                                <td class="Item__Col" colspan="4">
                                                                                    <div class="Report__Data">
                                                                                        <div class="ListData NotResponsive">
                                                                                            <div class="ListData__Content">
                                                                                                <div class="ListData__Item ListData__Item--NoAction">
                                                                                                    <div class="Data_Col">
                                                                                                <span class="Data_Label">
                                                                                                    الدرجة العلمية
                                                                                                </span>
                                                                                                        <span class="Data_Value">
                                                                                                    بكلوريا
                                                                                                </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="ListData__Item ListData__Item--NoAction">
                                                                                                    <div class="Data_Col">
                                                                                                <span class="Data_Label">
                                                                                                    نوع العقد
                                                                                                </span>
                                                                                                        <span class="Data_Value">
                                                                                                    متدرب
                                                                                                </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="ListData__Item ListData__Item--NoAction">
                                                                                                    <div class="Data_Col">
                                                                                                <span class="Data_Label">
                                                                                                    الوضع العائلي
                                                                                                </span>
                                                                                                        <span class="Data_Value">
                                                                                                    عازب
                                                                                                </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                            <tbody class="GroupRows">
                                                                            <tr class="GroupRows__MainRow Show">
                                                                                <td class="Item__Col">
                                                                                    1
                                                                                </td>
                                                                                <td class="Item__Col">
                                                                                    امير
                                                                                </td>
                                                                                <td class="Item__Col">
                                                                                    ذكر
                                                                                </td>
                                                                                <td class="Item__Col">
                                                                                    10-10-2010
                                                                                </td>
                                                                            </tr>
                                                                            <tr class="Left GroupRows__SubRows">
                                                                                <td class="Item__Col" colspan="4">
                                                                                    <div class="Report__Data">
                                                                                        <div class="ListData NotResponsive">
                                                                                            <div class="ListData__Content">
                                                                                                <div class="ListData__Item ListData__Item--NoAction">
                                                                                                    <div class="Data_Col">
                                                                                                <span class="Data_Label">
                                                                                                    الدرجة العلمية
                                                                                                </span>
                                                                                                        <span class="Data_Value">
                                                                                                    بكلوريا
                                                                                                </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="ListData__Item ListData__Item--NoAction">
                                                                                                    <div class="Data_Col">
                                                                                                <span class="Data_Label">
                                                                                                    نوع العقد
                                                                                                </span>
                                                                                                        <span class="Data_Value">
                                                                                                    متدرب
                                                                                                </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="ListData__Item ListData__Item--NoAction">
                                                                                                    <div class="Data_Col">
                                                                                                <span class="Data_Label">
                                                                                                    الوضع العائلي
                                                                                                </span>
                                                                                                        <span class="Data_Value">
                                                                                                    عازب
                                                                                                </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                            <tbody class="GroupRows">
                                                                            <tr class="GroupRows__MainRow Show">
                                                                                <td class="Item__Col">
                                                                                    1
                                                                                </td>
                                                                                <td class="Item__Col">
                                                                                    امير
                                                                                </td>
                                                                                <td class="Item__Col">
                                                                                    ذكر
                                                                                </td>
                                                                                <td class="Item__Col">
                                                                                    10-10-2010
                                                                                </td>
                                                                            </tr>
                                                                            <tr class="Left GroupRows__SubRows">
                                                                                <td class="Item__Col" colspan="4">
                                                                                    <div class="Report__Data">
                                                                                        <div class="ListData NotResponsive">
                                                                                            <div class="ListData__Content">
                                                                                                <div class="ListData__Item ListData__Item--NoAction">
                                                                                                    <div class="Data_Col">
                                                                                                <span class="Data_Label">
                                                                                                    الدرجة العلمية
                                                                                                </span>
                                                                                                        <span class="Data_Value">
                                                                                                    بكلوريا
                                                                                                </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="ListData__Item ListData__Item--NoAction">
                                                                                                    <div class="Data_Col">
                                                                                                <span class="Data_Label">
                                                                                                    نوع العقد
                                                                                                </span>
                                                                                                        <span class="Data_Value">
                                                                                                    متدرب
                                                                                                </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="ListData__Item ListData__Item--NoAction">
                                                                                                    <div class="Data_Col">
                                                                                                <span class="Data_Label">
                                                                                                    الوضع العائلي
                                                                                                </span>
                                                                                                        <span class="Data_Value">
                                                                                                    عازب
                                                                                                </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                            <tbody class="GroupRows">
                                                                            <tr class="GroupRows__MainRow Show">
                                                                                <td class="Item__Col">
                                                                                    1
                                                                                </td>
                                                                                <td class="Item__Col">
                                                                                    امير
                                                                                </td>
                                                                                <td class="Item__Col">
                                                                                    ذكر
                                                                                </td>
                                                                                <td class="Item__Col">
                                                                                    10-10-2010
                                                                                </td>
                                                                            </tr>
                                                                            <tr class="Left GroupRows__SubRows">
                                                                                <td class="Item__Col" colspan="4">
                                                                                    <div class="Report__Data">
                                                                                        <div class="ListData NotResponsive">
                                                                                            <div class="ListData__Content">
                                                                                                <div class="ListData__Item ListData__Item--NoAction">
                                                                                                    <div class="Data_Col">
                                                                                                <span class="Data_Label">
                                                                                                    الدرجة العلمية
                                                                                                </span>
                                                                                                        <span class="Data_Value">
                                                                                                    بكلوريا
                                                                                                </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="ListData__Item ListData__Item--NoAction">
                                                                                                    <div class="Data_Col">
                                                                                                <span class="Data_Label">
                                                                                                    نوع العقد
                                                                                                </span>
                                                                                                        <span class="Data_Value">
                                                                                                    متدرب
                                                                                                </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="ListData__Item ListData__Item--NoAction">
                                                                                                    <div class="Data_Col">
                                                                                                <span class="Data_Label">
                                                                                                    الوضع العائلي
                                                                                                </span>
                                                                                                        <span class="Data_Value">
                                                                                                    عازب
                                                                                                </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                            <tbody class="GroupRows">
                                                                            <tr class="GroupRows__MainRow Show">
                                                                                <td class="Item__Col">
                                                                                    1
                                                                                </td>
                                                                                <td class="Item__Col">
                                                                                    امير
                                                                                </td>
                                                                                <td class="Item__Col">
                                                                                    ذكر
                                                                                </td>
                                                                                <td class="Item__Col">
                                                                                    10-10-2010
                                                                                </td>
                                                                            </tr>
                                                                            <tr class="Left GroupRows__SubRows">
                                                                                <td class="Item__Col" colspan="4">
                                                                                    <div class="Report__Data">
                                                                                        <div class="ListData NotResponsive">
                                                                                            <div class="ListData__Content">
                                                                                                <div class="ListData__Item ListData__Item--NoAction">
                                                                                                    <div class="Data_Col">
                                                                                                <span class="Data_Label">
                                                                                                    الدرجة العلمية
                                                                                                </span>
                                                                                                        <span class="Data_Value">
                                                                                                    بكلوريا
                                                                                                </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="ListData__Item ListData__Item--NoAction">
                                                                                                    <div class="Data_Col">
                                                                                                <span class="Data_Label">
                                                                                                    نوع العقد
                                                                                                </span>
                                                                                                        <span class="Data_Value">
                                                                                                    متدرب
                                                                                                </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="ListData__Item ListData__Item--NoAction">
                                                                                                    <div class="Data_Col">
                                                                                                <span class="Data_Label">
                                                                                                    الوضع العائلي
                                                                                                </span>
                                                                                                        <span class="Data_Value">
                                                                                                    عازب
                                                                                                </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                            <tbody class="GroupRows">
                                                                            <tr class="GroupRows__MainRow Show">
                                                                                <td class="Item__Col">
                                                                                    1
                                                                                </td>
                                                                                <td class="Item__Col">
                                                                                    امير
                                                                                </td>
                                                                                <td class="Item__Col">
                                                                                    ذكر
                                                                                </td>
                                                                                <td class="Item__Col">
                                                                                    10-10-2010
                                                                                </td>
                                                                            </tr>
                                                                            <tr class="Left GroupRows__SubRows">
                                                                                <td class="Item__Col" colspan="4">
                                                                                    <div class="Report__Data">
                                                                                        <div class="ListData NotResponsive">
                                                                                            <div class="ListData__Content">
                                                                                                <div class="ListData__Item ListData__Item--NoAction">
                                                                                                    <div class="Data_Col">
                                                                                                <span class="Data_Label">
                                                                                                    الدرجة العلمية
                                                                                                </span>
                                                                                                        <span class="Data_Value">
                                                                                                    بكلوريا
                                                                                                </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="ListData__Item ListData__Item--NoAction">
                                                                                                    <div class="Data_Col">
                                                                                                <span class="Data_Label">
                                                                                                    نوع العقد
                                                                                                </span>
                                                                                                        <span class="Data_Value">
                                                                                                    متدرب
                                                                                                </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="ListData__Item ListData__Item--NoAction">
                                                                                                    <div class="Data_Col">
                                                                                                <span class="Data_Label">
                                                                                                    الوضع العائلي
                                                                                                </span>
                                                                                                        <span class="Data_Value">
                                                                                                    عازب
                                                                                                </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
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
                            </div>
                        </div>
                    </section>
                </main>
            </div>
            <script>
                window.onload = function () {
                    javascript:window.print();
                };
            </script>
        </body>
    </html>
