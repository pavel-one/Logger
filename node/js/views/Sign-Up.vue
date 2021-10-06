<template>
	<div>

		<div class="sign-up-header" >
			<div class="content">
				<h1 class="mb-5">Регистрация</h1>
				<p class="text-lg">
                    Для возможности использовать наш сервис - вам необходимо зарегистрироваться, не переживайте, это бесплатно и
                    <br> <b>всегда будет так</b>
                </p>
			</div>
		</div>

		<!-- Sign Up Form -->
		<a-card :bordered="false" class="card-signup header-solid h-full" :bodyStyle="{paddingTop: 0}">
			<template #title>
				<h5 class="font-semibold text-center">Регистрация</h5>
			</template>
			<div class="sign-up-gateways">
    			<a-button @click="redirectGithub">
                    <a-icon type="github" />
				</a-button>
    			<a-button @click="redirectYandex">
                    <svg class="social-logo yandex-logo" xmlns="http://www.w3.org/2000/svg"
                         x="0px"
                         y="0px" viewBox="0 0 1080 1080" xml:space="preserve">
<circle class="st0" cx="540" cy="540" r="538.9"/>
                        <path id="Glyph" class="st1" d="M735,878.3H616.7V293.2H564c-96.6,0-147.2,48.3-147.2,120.4c0,81.8,34.9,119.7,107.1,168l59.5,40.1
	l-171,256.5H285.2l153.9-229c-88.5-63.2-138.3-124.9-138.3-229c0-130.1,90.7-218.6,262.4-218.6h171v676.5H735z"/>
</svg>
				</a-button>
                <a-button @click="redirectVK">
                    <svg class="social-logo vk-logo" fill="none" height="48" viewBox="0 0 48 48" width="48" xmlns="http://www.w3.org/2000/svg">
                        <path class="st0" d="m0 23c0-10.8423 0-16.26346 3.36827-19.63173s8.78943-3.36827 19.63173-3.36827h2c10.8423 0 16.2635 0 19.6317 3.36827 3.3683 3.36827 3.3683 8.78943 3.3683 19.63173v2c0 10.8423 0 16.2635-3.3683 19.6317-3.3682 3.3683-8.7894 3.3683-19.6317 3.3683h-2c-10.8423 0-16.26346 0-19.63173-3.3683-3.36827-3.3682-3.36827-8.7894-3.36827-19.6317z" fill="#000"/>
                        <path clip-rule="evenodd" d="m13.0009 15h-3.5008c-1.00024 0-1.2003.4708-1.2003.9898 0 .9271 1.18686 5.525 5.5262 11.6061 2.8929 4.1529 6.9687 6.4041 10.6776 6.4041 2.2253 0 2.5006-.5 2.5006-1.3612v-3.1388c0-1 .2108-1.1996.9154-1.1996.5193 0 1.4094.2596 3.4864 2.2619 2.3737 2.3731 2.765 3.4377 4.1001 3.4377h3.5008c1.0003 0 1.5004-.5 1.2119-1.4867-.3157-.9834-1.449-2.4103-2.9528-4.1016-.816-.9641-2.0399-2.0023-2.4108-2.5215-.5192-.6674-.3709-.9641 0-1.5573 0 0 4.2652-6.007 4.7103-8.0463.2225-.7417 0-1.2866-1.0587-1.2866h-3.5008c-.8901 0-1.3005.4708-1.5231.9898 0 0-1.7802 4.3384-4.3022 7.1565-.816.8157-1.1869 1.0753-1.632 1.0753-.2225 0-.5446-.2596-.5446-1.0011v-6.9339c0-.89-.2583-1.2866-1.0002-1.2866h-5.5013c-.5562 0-.8908.413-.8908.8045 0 .8436 1.261 1.0382 1.391 3.4113v5.1542c0 1.13-.2042 1.3349-.6492 1.3349-1.1868 0-4.0737-4.3578-5.7859-9.3442-.3355-.9692-.6721-1.3607-1.5668-1.3607z" fill="#fff" fill-rule="evenodd"/>
                    </svg>
                </a-button>
                <a-button @click="redirectTelegram">
                    <svg class="social-logo telegram-logo" viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs>
                            <linearGradient x1="50%" y1="0%" x2="50%" y2="99.2583404%" id="linearGradient-1">
                                <stop stop-color="#2AABEE" offset="0%"></stop>
                                <stop stop-color="#229ED9" offset="100%"></stop>
                            </linearGradient>
                        </defs>
                        <g id="Artboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <circle id="Oval" class="st0" cx="500" cy="500" r="500"></circle>
                            <path d="M226.328419,494.722069 C372.088573,431.216685 469.284839,389.350049 517.917216,369.122161 C656.772535,311.36743 685.625481,301.334815 704.431427,301.003532 C708.567621,300.93067 717.815839,301.955743 723.806446,306.816707 C728.864797,310.92121 730.256552,316.46581 730.922551,320.357329 C731.588551,324.248848 732.417879,333.113828 731.758626,340.040666 C724.234007,419.102486 691.675104,610.964674 675.110982,699.515267 C668.10208,736.984342 654.301336,749.547532 640.940618,750.777006 C611.904684,753.448938 589.856115,731.588035 561.733393,713.153237 C517.726886,684.306416 492.866009,666.349181 450.150074,638.200013 C400.78442,605.66878 432.786119,587.789048 460.919462,558.568563 C468.282091,550.921423 596.21508,434.556479 598.691227,424.000355 C599.00091,422.680135 599.288312,417.758981 596.36474,415.160431 C593.441168,412.561881 589.126229,413.450484 586.012448,414.157198 C581.598758,415.158943 511.297793,461.625274 375.109553,553.556189 C355.154858,567.258623 337.080515,573.934908 320.886524,573.585046 C303.033948,573.199351 268.692754,563.490928 243.163606,555.192408 C211.851067,545.013936 186.964484,539.632504 189.131547,522.346309 C190.260287,513.342589 202.659244,504.134509 226.328419,494.722069 Z" id="Path-3" fill="#FFFFFF"></path>
                        </g>
                    </svg>
                </a-button>
			</div>
			<p class="text-center my-25 font-semibold text-muted">или</p>
			<a-form
				id="components-form-demo-normal-login"
				:form="form"
				class="login-form"
				@submit="handleSubmit"
			>
				<a-form-item class="mb-10">
					<a-input
						v-decorator="[
                            'name',
                            { rules: [{ required: true, message: 'Пожалуйста, введите ваше имя' }] },
						]"
						placeholder="Имя"
					>
					</a-input>
				</a-form-item>
				<a-form-item class="mb-10">
					<a-input
						v-decorator="[
                            'email',
                            { rules: [{ required: true, message: 'Пожалуйста, введите ваш email' }] },
						]"
						placeholder="Email"
					>
					</a-input>
				</a-form-item>
				<a-form-item class="mb-5">
					<a-input
						v-decorator="[
                            'password',
                            { rules: [{ required: true, message: 'Пароль обязателен' }] },
						]"
						type="password"
						placeholder="Пароль"
					>
					</a-input>
				</a-form-item>
				<a-form-item class="mb-10">
					<a-checkbox
						v-decorator="[
                            'agreement',
                            { rules: [{ required: true, message: 'Согласие обязательно' }] },
						]"
					>
						Я согласен на все согласия
					</a-checkbox>
				</a-form-item>
				<a-form-item>
					<a-button type="primary" block html-type="submit" class="login-form-button">
						Регистрация
					</a-button>
				</a-form-item>
			</a-form>
			<p class="font-semibold text-muted text-center">Уже есть аккаунт? <router-link to="/sign-in" class="font-bold text-dark">Войти</router-link></p>
		</a-card>
		<!-- / Sign Up Form -->

	</div>
</template>

<script>

	export default ({
		data() {
			return {
			}
		},
		beforeCreate() {
			this.form = this.$form.createForm(this, { name: 'register' });
		},
        methods: {
			handleSubmit(e) {
				e.preventDefault();
				this.form.validateFields((err, values) => {
					if ( !err ) {
						console.log('Received values of form: ', values) ;
					}
				});
			},
            redirectGithub: function () {
                window.location.href = '/social/github'
            },
            redirectYandex: function () {
                window.location.href = '/social/yandex'
            },
            redirectVK: function () {
                window.location.href = '/social/vk'
            },
            redirectTelegram: function () {
                window.location.href = '/social/telegram'
            },
		},
	})

</script>

<style lang="scss">
</style>
