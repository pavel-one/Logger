<template>
	<a-layout-footer>

		<!-- Copyright Notice -->
		<p class="copyright">
            © 2021 Development by <a href="https://pavel.one" target="_blank">PAVEL.ONE</a>, see in <a
            href="https://github.com/pavel-one/Logger" target="_blank">GitHub</a>
		</p>
		<!-- / Copyright Notice -->

	</a-layout-footer>
	<!-- / Layout Footer -->

</template>

<script>

	export default ({
		data() {
			return {
			}
		},
	})

</script>

<style lang="scss" scoped>

	.nav-link svg {
		margin-right: 5px;
		vertical-align: middle;
	}
	.nav-link span {
		vertical-align: middle;
	}
	.ant-menu-submenu-popup {
		width: 100%;
	}
    a {
        color: black !important;
        font-weight: 700;
    }
    a:hover {
        color: #1890FF !important
    }
</style>
