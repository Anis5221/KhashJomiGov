@extends('layouts.admin-app')
@section('title', 'Ac Land')
@section('contents')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Ac Land</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Ac Land</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    @include('layouts.partial.flash-alert')
    <div class="container">
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                <div class="row">
                        <div class="col-md-12">
                            <form method="post" class=" action="{{ route('application.store') }}" enctype="multipart/form-data" >
                                @csrf
                                <div class="from-group my-2">
                                    <div class="">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <label class="mb-3 ml-4" for=""> ১।(ক) দরখাস্তকারী কোন শ্রেণীর ভুমিহীন (প্রযোজ্য ক্ষেত্র/ক্ষেত্র সমুহে টিক চিহ্ন দিন)*:</label>

                                                <div class="ml-5">
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" name="app_class[]" value="দুঃস্থ মুক্তিযুদ্দা পরিবার" type="checkbox">
                                                        <label class="form-check-label ml-4">দুঃস্থ মুক্তিযুদ্দা পরিবার।</label>
                                                    </div>
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" name="app_class[]" value="নদী ভাঙা পরিবার" type="checkbox">
                                                        <label class="form-check-label ml-4">নদী ভাঙা পরিবার।</label>
                                                    </div>
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" name="app_class[]" value="সক্ষম পুত্রসহ বিধবা/স্বামী পরিতেক্ত পরিবার" type="checkbox">
                                                        <label class="form-check-label ml-4">সক্ষম পুত্রসহ বিধবা/স্বামী পরিতেক্ত পরিবার।</label>
                                                    </div>
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" name="app_class[]" value="কৃষি জমি নাই ও বাস্তবাটিহিন পরিবার" type="checkbox">
                                                        <label class="form-check-label ml-4">কৃষি জমি নাই ও বাস্তবাটিহিন পরিবার</label>
                                                    </div>
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" name="app_class[]" value="অনধিক ০.০১ একর জমি আছে কিন্তু কৃষি জমি নাই এমন কৃষি নির্বর পরিবার" type="checkbox">
                                                        <label class="form-check-label ml-4">অনধিক ০.০১ একর জমি আছে কিন্তু কৃষি জমি নাই এমন কৃষি নির্বর পরিবার</label>
                                                    </div>
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" name="app_class[]"  value="অধিগ্রহনের ফলে ভূমিহীন হইয়া পরিয়াছে এমন পরিবার" type="checkbox">
                                                        <label class="form-check-label ml-4">অধিগ্রহনের ফলে ভূমিহীন হইয়া পরিয়াছে এমন পরিবার।</label>
                                                    </div>
                                                    @error('app_class')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div style="" class=" border-dark">
                                                <label for="">Image:</label>
                                                <input name="avater" value="{{$application->avater}}" class="form-control @error('avater') is-invalid @enderror" type="file">
                                                @error('avater')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                <div class="form-group my-2">
                                    <div class="">
                                        <label class="my-3" for="">   (খ) ভুমিহীন শ্রেণীর স্বপক্ষে দাখিলকৃত কাগজপত্রঃ</label>*

                                        <div class="form-check row">
                                            <div class="col-md-5">
                                                <p for="">যথাযথ কর্তৃপক্ষ কর্তৃক প্রদত্ত মুক্তিযুদ্দা সনদ:</p>
                                            </div>

                                            <div class="col-md-6">
                                                <input type="file" value="{{old('vumihi_muktijudda_sonod')}}" name="vumihi_muktijudda_sonod" class="form-control-file @error('vumihi_muktijudda_sonod') is-invalid @enderror">
                                                @error('vumihi_muktijudda_sonod')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="form-check row">
                                            <div class="col-md-5">
                                                <p>ইউনিয়ন চেয়ারম্যান/পৌর চেয়ারমেন/ওয়ার্ড কমিশনের সনদ*:</p>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="file" name="vumihi_commission_sonod" value="{{old('vumihi_commission_sonod')}}"
                                                        class="form-control-file @error('vumihi_muktijudda_sonod') is-invalid @enderror">
                                                @error('vumihi_commission_sonod')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="form-check row">
                                            <div class="col-md-5">
                                                <p for="">অন্যান্যা:</p>
                                            </div>

                                            <div class="col-md-6">
                                                <input type="file" name="vumihin_others_sonod[]" multiple="multiple" value="{{old('vumihin_others_sonod')}}"
                                                        class="form-control-file @error('vumihi_muktijudda_sonod') is-invalid @enderror">
                                                @error('vumihin_others_sonod')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <div class="col-md-5">
                                        <label for="">২।  দরখাস্তকারীর পরিবার প্রদানের নাম: </label>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control @error('main_name') is-invalid @enderror"
                                                    name="main_name" placeholder="মোঃ কামাল"
                                                    value="{{ old('main_name') }}">
                                            @error('main_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-4">
                                                <label for="">বয়স:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="number" class="form-control @error('main_age') is-invalid @enderror"
                                                        name="main_age" value="{{old('main_age')}}">
                                                @error('main_age')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-md-5">
                                        <label  for="">৩।  দরখাস্তকারীর পিতা/স্বামীর নাম: </label>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-12">
                                            <input type="text" class="form-control @error('main_fathers_name') is-invalid @enderror"
                                                    name="main_fathers_name" value="{{ old('main_fathers_name') }}"
                                                    placeholder="মোঃ কামাল">
                                            @error('main_fathers_name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                            @enderror
                                        </div>

                                        <div class="form-check col-md-3">
                                            <input class="form-check-input isMortal" value="জীবিত" name="main_fathers_mortal"  type="checkbox">
                                            <label class="form-check-label ml-4">জীবিত</label>
                                        </div>
                                        <div class="form-check col-md-3" >
                                            <input class="form-check-input isMortal" value="মৃত" name="main_fathers_mortal"  type="checkbox">
                                            <label class="form-check-label ml-4">মৃত</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="" >৪।  দরখাস্তকারীর জন্মস্থান/ঠিকানা*: </label>

                                        <div class="from-group row">
                                            <div class="col-md-5">
                                                <label class="ml-md-5 ml-lg-5 ml-xl-5" for="">জেলাঃ</label>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                <select name="main_zila" class="form-control ml-2" placeholder=""id="">
                                                    <option value="লালমনিরহাট">লালমনিরহাট</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="from-group row">
                                            <div class="col-md-5">
                                                <label class="ml-md-5 ml-lg-5 ml-xl-5" for="">উপজেলাঃ</label>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                <select name="main_upzila" class="form-control ml-2" id="main_upzila">
                                                    @foreach ($upa_zilas as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>

                                            </div>

                                        </div>
                                        <div class="from-group row">
                                            <div class="col-md-5">
                                                <label class="ml-md-5 ml-lg-5 ml-xl-5" for="">ইউনিয়নঃ</label>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-3 setUnion">

                                            </div>

                                        </div>
                                            <div class="from-group row">
                                                <div class="col-md-5">
                                                    <label class="ml-md-5 ml-lg-5 ml-xl-5" for="">গ্রামঃ</label>
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-3">
                                                    <input  name="main_village" type="text" class="form-control ml-2" placeholder="">
                                                </div>
                                            </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-5">
                                        <label for="">৫।  পরিবার প্রদানের স্ত্রী/স্বামী নাম*: </label>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control @error('main_f_or_m_name') is-invalid @enderror"
                                                    name="main_f_or_m_name" value="{{old('main_f_or_m_name')}}"
                                                    placeholder="মোঃ কামাল">
                                            @error('main_f_or_m_name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-4">
                                                <label for="">বয়স*:</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="number" class="form-control @error('main_f_or_m_age') is-invalid @enderror"
                                                        name="main_f_or_m_age" value="{{old('main_f_or_m_age')}}">
                                                @error('main_f_or_m_age')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                @enderror
                                            </div>

                                        </div>

                                    </div>

                                </div>
                                <div class="form-group ">
                                    <label for="">৬।  দরখাস্তকারীর পরিবারের সদস্যদের নাম*: </label>
                                    <div class="table-responsive">
                                    <table class=" table table-bordered">
                                        <thead >
                                            <tr >
                                                <th class="text-center">ক্রমিক নং</th>
                                                <th class="text-center">নাম</th>
                                                <th style="width: 20px;" class="text-center">বয়স</th>
                                                <th class="text-center">সম্পর্ক</th>
                                                <th class="text-center">কি করেন</th>
                                                <th class="text-center">মন্তব্য</th>
                                                <th class="text-center"><a id="add" href="javascript:void(0)" class="btn btn-secondary">+</a></th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableBody">
                                            <tr>
                                                <td class="text-center">
                                                    1
                                                </td>
                                                <td>
                                                    <input name="name[][name]" class="form-control" type="text">
                                                </td>
                                                <td>
                                                    <input style="width: 60px;" class="form-control" name="age[][age]" min=1 type="number">
                                                </td>
                                                <td>
                                                    <input style="width: 100px;" class="form-control" name="relation[][relation]" type="text">
                                                </td>
                                                <td>
                                                    <input name="whatdo[][whatdo]" class="form-control" type="text">
                                                </td>
                                                <td>
                                                    <input name="comment[][comment]" class="form-control" type="text">
                                                </td>
                                                <td>
                                                    <a id="delete" class="btn btn-sm btn-secondary rounded" >-</a>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">৭।  দরখাস্ত কারীর নিজের বসত বাড়ির বিবরণ*: </label>
                                    <textarea name="dorkhastokarir_barir_biboron"
                                                class="form-control @error('dorkhastokarir_barir_biboron') is-invalid @enderror">{!!old('dorkhastokarir_barir_biboron')!!}</textarea>
                                    @error('dorkhastokarir_barir_biboron')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">৮।  নিজের বসতবাটি না থাকিলে পরিবার যেখানে বাস করে উহার বিবরণ (বর্তমান ঠিকানা)*: </label>
                                    <textarea name="dorkhastokarir_present_biboron"
                                    class="form-control @error('dorkhastokarir_present_biboron') is-invalid @enderror">{!!old('dorkhastokarir_present_biboron')!!}</textarea>
                                    @error('dorkhastokarir_present_biboron')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">৯।  দরখাস্তকারী অথবা তাহার পিতা/মাতা/পর্বে কোনো খাস কৃষি জমি পাইয়া থাকিলে উহার বিবরণ: </label>
                                    <textarea name="dorkhastokarir_khas_jomir_biboron" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">১০।  খাস জমির জন্য কোনো জায়গা দরখাস্ত দাখিল করিলে উহার বিবরণ: </label>
                                    <textarea name="dorkhastokarir_khas_dakhil_biboron" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">১১।  নদী ভাঙ্গা পরিবার হইলে কবে কোথায় নদী ভাঙিয়াছিল  এবং সেই জায়গার কোনো দলিল দস্তাবেজ থাকিলে উহার বিবরণ (প্রয়োজনে পৃথক কাগজ ব্যবহার করিতে হইবে): </label>
                                    <textarea name="dorkhastokarir_nodi_vangon_biborn" id="summernote" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">১২।  পরিবারের কেহ শহীদ বা পঙ্গু মুক্তিযোদ্দা হইলে তাহার বিস্তারিত পরিচয় ও শহীদ বা পঙ্গু হইবার বিবরণ ও প্রমাণ: </label>
                                    <textarea name="dorkhastokarir_shohidorpongo_person_biboron" id="summernote" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <button id="getValue" type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
