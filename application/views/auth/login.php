        <!-- Sing in  Form -->
        <section class="sign-in" style="background-color: #FFB7CB;">
            <div class="containerLogin">
                <div class="signin-content">
                    <div class="signin-form">
                        <img class="logoDIV" src="<?= base_url() ?>assets/auth/images/icon.jpg">

                        <form action="<?= base_url() ?>auth/prosesLoginPegawai" method="POST" class="register-form" id="login-form">
                            <?= $this->session->flashdata('message'); ?><br>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="email" id="email" placeholder="Email" autofocus required />
                            </div>
                            <div class="form-group">
                                <label for="Password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" required />
                            </div>
                            <div class="form-group">
                                <a href="<?= base_url() ?>lupapassword/reset">Lupa Password?</a>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                            </div>
                        </form>
						<br>
                        <h1>Peraktek Fisioterapi</h1>
						<h3>Iwan Kartiwan, Ftr</h3>
                    </div>
                </div>
            </div>
        </section>
