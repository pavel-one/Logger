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
                    <svg class="yandex-logo" xmlns="http://www.w3.org/2000/svg"
                         x="0px"
                         y="0px" viewBox="0 0 1080 1080" xml:space="preserve">
<circle class="st0" cx="540" cy="540" r="538.9"/>
                        <path id="Glyph" class="st1" d="M735,878.3H616.7V293.2H564c-96.6,0-147.2,48.3-147.2,120.4c0,81.8,34.9,119.7,107.1,168l59.5,40.1
	l-171,256.5H285.2l153.9-229c-88.5-63.2-138.3-124.9-138.3-229c0-130.1,90.7-218.6,262.4-218.6h171v676.5H735z"/>
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
						{ rules: [{ required: true, message: 'Please input your name!' }] },
						]"
						placeholder="Name"
					>
					</a-input>
				</a-form-item>
				<a-form-item class="mb-10">
					<a-input
						v-decorator="[
						'email',
						{ rules: [{ required: true, message: 'Please input your email!' }] },
						]"
						placeholder="Email"
					>
					</a-input>
				</a-form-item>
				<a-form-item class="mb-5">
					<a-input
						v-decorator="[
						'password',
						{ rules: [{ required: true, message: 'Please input your Password!' }] },
						]"
						type="password"
						placeholder="Password"
					>
					</a-input>
				</a-form-item>
				<a-form-item class="mb-10">
					<a-checkbox
						v-decorator="[
						'remember',
						{
							valuePropName: 'checked',
							initialValue: true,
						},
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
			// Creates the form and adds to it component's "form" property.
			this.form = this.$form.createForm(this, { name: 'normal_login' });
		},
		methods: {
			// Handles input validation after submission.
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
		},
	})

</script>

<style lang="scss">
</style>
