<?= $this->include('layout/header') ?>

    <div class="row justify-content-center">

        <div class="col-md-4">

            <div class="card">

                <div class="card-header">
                    Login Admin
                </div>

                <div class="card-body">

                    <?php if(session()->getFlashdata('error')) : ?>

                        <div class="alert alert-danger">

                            <?= session()->getFlashdata('error') ?>

                        </div>

                    <?php endif ?>

                    <form action="/login/auth"
                          method="post">

                        <div class="mb-3">

                            <label>Username</label>

                            <input
                                type="text"
                                name="username"
                                class="form-control"
                                required>

                        </div>

                        <div class="mb-3">

                            <label>Password</label>

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                required>

                        </div>

                        <button
                            class="btn btn-primary w-100">

                            Login

                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?= $this->include('layout/footer') ?>