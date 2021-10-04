<template>
	<div>
		<a-layout class="layout-dashboard" id="layout-dashboard" :class="['navbar-fixed', 'has-sidebar', layoutClass]">
			<DashboardSidebar></DashboardSidebar>

			<a-layout>
				<DashboardHeader
					:sidebarCollapsed="true"
					:navbarFixed="true"
				></DashboardHeader>

				<a-layout-content>
					<router-view />
				</a-layout-content>

				<DashboardFooter></DashboardFooter>
			</a-layout>
		</a-layout>

	</div>
</template>

<script>
	import DashboardSidebar from '../components/Sidebars/DashboardSidebar';
	import DashboardHeader from '../components/Headers/DashboardHeader';
	import DashboardFooter from '../components/Footers/DashboardFooter';

	export default ({
		components: {
			DashboardSidebar,
			DashboardHeader,
			DashboardFooter,
		},
		data() {
			return {
				sidebarCollapsed: false,
				sidebarColor: "primary",
				sidebarTheme: "light",
				navbarFixed: false,
				showSettingsDrawer: false,
			}
		},
		computed: {
			layoutClass() {
				return this.$route.meta.layoutClass ;
			}
		},
	})

</script>
