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
    			<a-button>
                    <a-icon type="github" />
				</a-button>
    			<a-button>
                    <a-icon type="google" />
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
		},
	})

</script>

<style lang="scss">
</style>
