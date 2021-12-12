@extends('frontend.layout.head_foot')
@section('css')
<link rel="stylesheet" href="{{asset("frontend/css/profile.css")}}" />
@endsection
@section('content')

<div class="container">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <div style="
                  height: 100px;
                  background-image: url('./assets/img/person.jpg');
                  width: 76px;
                  background-size: contain;
                  background-position: center;
                  background-repeat: no-repeat;
                  border-radius: 20px;
                " alt="Admin" class="p-1 bg-primary img-fluid"></div>

                            <div class="mt-3">
                                <h4>Ahmed Alsolya</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3"></div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">الاسم</h6>
                            </div>
                            <div class="col-sm-9 text-secondary" id="username">
                                ahmed_alsolya
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">التقييم</h6>
                            </div>
                            <div class="col-sm-9 text-secondary" id="star">
                                ahmed@example.com
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">password</h6>
                            </div>
                            <div class="col-sm-9 text-secondary" id="userpassword">
                                454fdffgrt(وهمي)
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary" id="useremail">
                                test@test.com
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-sm-12">
                                <a class="btn btn-info w-100 d-block" href="editprofile.html">Edit</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-4">
        <div class="list-group" id="list-tab" role="tablist">
          <a
            class="list-group-item list-group-item-action active"
            id="list-home-list"
            data-toggle="list"
            href="#list-home"
            role="tab"
            aria-controls="home"
            >متجرك</a
          >
          <a
            class="list-group-item list-group-item-action"
            id="list-profile-list"
            data-toggle="list"
            href="#list-profile"
            role="tab"
            aria-controls="profile"
            >المفضله</a
          >
        </div>
      </div>
      <div class="col-8">
        <div class="tab-content" id="nav-tabContent">
          <div
            class="tab-pane fade show active"
            id="list-home"
            role="tabpanel"
            aria-labelledby="list-home-list"
          >
            <div class="morelover row">
              <div class="col-md-4">
                <div class="card">
                  <div
                    class="img_card"
                    style="background-image: url('assets/img/thumb-1.jpg')"
                  ></div>
                  <div class="card-body">
                    <h5 class="card-title">ساعه</h5>
                    <h5 class="card-title">مقاس: 6.5</h5>
                    <h5 class="card-title">Micheal Kors</h5>
                    <h5 class="card-title">150 رس</h5>
                    <a href="#" class="btn buy">تعديل</a>
                                <button class="btn btn-danger">حذف</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <a href="#">
                            <div class="card" style="
                      background-color: #ddd;
                      height: 100%;
                      display: flex;
                      justify-content: center;
                      align-items: center;
                      color: #17a2b8;
                      font-size: 50px;
                      font-weight: 900;
                    ">
                                +
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                <div class="morelover row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="img_card" style="background-image: url('assets/img/thumb-1.jpg')"></div>
                            <div class="card-body">
                                <h5 class="card-title">ساعه</h5>
                                <h5 class="card-title">مقاس: 6.5</h5>
                                <h5 class="card-title">Micheal Kors</h5>
                                <h5 class="card-title">150 رس</h5>
                                <a href="#" class="btn buy">شراء</a>
                                <button class="btn btn-danger">حذف</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">متجرك</a
        >
      </li>
      <li class="nav-item" role="presentation">
        <a
          class="nav-link"
          id="fav-tab"
          data-toggle="tab"
          href="#fav"
          role="tab"
          aria-controls="profile"
          aria-selected="false"
          >المفضله</a
        >
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div
        class="tab-pane fade show active"
        id="home"
        role="tabpanel"
        aria-labelledby="home-tab"
      >
        <div class="morelover row">
          <div class="col-md-4">
            <div class="card">
              <div
                class="img_card"
                style="background-image: url('assets/img/thumb-1.jpg')"
              ></div>
              <div class="card-body">
                <h5 class="card-title">ساعه</h5>
                <h5 class="card-title">مقاس: 6.5</h5>
                <h5 class="card-title">Micheal Kors</h5>
                <h5 class="card-title">150 رس</h5>
                <a href="#" class="btn buy">تعديل</a>
        <button class="btn btn-danger">حذف</button>
        </div>
        </div>
        </div>
        <div class="col-md-4">
            <a href="#">
                <div class="card" style="
                  background-color: #ddd;
                  height: 100%;
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  color: #17a2b8;
                  font-size: 50px;
                  font-weight: 900;
                ">
                    +
                </div>
            </a>
        </div>
        </div>
        </div>
        <div class="tab-pane fade" id="fav" role="tabpanel" aria-labelledby="fav-tab">
            <div class="morelover row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="img_card" style="background-image: url('assets/img/thumb-1.jpg')"></div>
                        <div class="card-body">
                            <h5 class="card-title">ساعه</h5>
                            <h5 class="card-title">مقاس: 6.5</h5>
                            <h5 class="card-title">Micheal Kors</h5>
                            <h5 class="card-title">150 رس</h5>
                            <a href="#" class="btn buy">شراء</a>
                            <button class="btn btn-danger">حذف</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
@endsection