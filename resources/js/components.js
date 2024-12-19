// sections
import Section from '@/Components/App/Sections/Section.vue';
import Container from '@/Components/App/Sections/Container.vue';

// headings
import DisplayHeading from '@/Components/App/Texts/DisplayHeading.vue';
import Heading1 from '@/Components/App/Texts/Heading1.vue';
import Heading2 from '@/Components/App/Texts/Heading2.vue';
import Heading3 from '@/Components/App/Texts/Heading3.vue';
import Heading4 from '@/Components/App/Texts/Heading4.vue';
import Heading5 from '@/Components/App/Texts/Heading5.vue';
import Heading6 from '@/Components/App/Texts/Heading6.vue';
import PreHeading from '@/Components/App/Texts/PreHeading.vue';
import Intro from '@/Components/App/Texts/Intro.vue';
import BodyText from '@/Components/App/Texts/BodyText.vue';
import Medium from '@/Components/App/Texts/Medium.vue';
import Small from '@/Components/App/Texts/Small.vue';
import ExtraSmall from '@/Components/App/Texts/ExtraSmall.vue';
import Tiny from '@/Components/App/Texts/Tiny.vue';
import Large from '@/Components/App/Texts/Large.vue';

// debug
import DebugGrid from '@/Components/App/Debug/DebugGrid.vue';
import DebugPanel from '@/Components/App/Debug/DebugPanel.vue';

// loading indicator
import LoadingIndicator from '@/Components/App/LoadingIndicator.vue';

// buttons
import AppButton from '@/Components/App/Buttons/AppButton.vue';
import PrimaryButton from '@/Components/App/Buttons/PrimaryButton.vue';
import PrimaryLinkButton from '@/Components/App/Buttons/PrimaryLinkButton.vue';

// form
import FormInput from '@/Components/App/Form/FormInput.vue';
import FormSelect from './Components/App/Form/FormSelect.vue';
import FormFileInput from './Components/App/Form/FormFileInput.vue';
import FormToggle from './Components/App/Form/FormToggle.vue';
import FormLabel from './Components/App/Form/FormLabel.vue';

// admin pages
import AdminPageHeading from '@/Components/App/Admin/AdminPageHeading.vue';
import AdminIndexPage from '@/Components/App/Admin/AdminIndexPage.vue';
import AdminEditPage from '@/Components/App/Admin/AdminEditPage.vue';
import AdminShowPage from '@/Components/App/Admin/AdminShowPage.vue';
import AdminCreatePage from '@/Components/App/Admin/AdminCreatePage.vue';
import AdminImageEditPage from '@/Components/App/Admin/AdminImageEditPage.vue';
import AdminCreateForm from '@/Components/App/Admin/AdminCreateForm.vue';

// admin components
import Pagination from '@/Components/App/Admin/Pagination.vue';
import TableSearch from '@/Components/App/Admin/TableSearch.vue';

// horizontal tab bar
import HorizontalTabBar from '@/Components/App/Tabs/HorizontalTabBar.vue';

const components = [
  { name: 'Section', component: Section },
  { name: 'Container', component: Container },

  // texts
  { name: 'DisplayHeading', component: DisplayHeading },
  { name: 'Heading1', component: Heading1 },
  { name: 'Heading2', component: Heading2 },
  { name: 'Heading3', component: Heading3 },
  { name: 'Heading4', component: Heading4 },
  { name: 'Heading5', component: Heading5 },
  { name: 'Heading6', component: Heading6 },
  { name: 'PreHeading', component: PreHeading },
  { name: 'Intro', component: Intro },
  { name: 'BodyText', component: BodyText },
  { name: 'Medium', component: Medium },
  { name: 'Small', component: Small },
  { name: 'ExtraSmall', component: ExtraSmall },
  { name: 'Tiny', component: Tiny },
  { name: 'Large', component: Large },

  // debug
  { name: 'DebugGrid', component: DebugGrid },
  { name: 'DebugPanel', component: DebugPanel },

  // loading indicator
  { name: 'LoadingIndicator', component: LoadingIndicator },

  // buttons
  { name: 'AppButton', component: AppButton },
  { name: 'PrimaryButton', component: PrimaryButton },
  { name: 'PrimaryLinkButton', component: PrimaryLinkButton },

  // form
  { name: 'FormInput', component: FormInput },
  { name: 'FormSelect', component: FormSelect },
  { name: 'FormFileInput', component: FormFileInput },
  { name: 'FormToggle', component: FormToggle },
  { name: 'FormLabel', component: FormLabel },

  // admin pages
  { name: 'AdminPageHeading', component: AdminPageHeading },
  { name: 'AdminIndexPage', component: AdminIndexPage },
  { name: 'AdminEditPage', component: AdminEditPage },
  { name: 'AdminShowPage', component: AdminShowPage },
  { name: 'AdminCreatePage', component: AdminCreatePage },
  { name: 'AdminImageEditPage', component: AdminImageEditPage },
  { name: 'AdminCreateForm', component: AdminCreateForm },

  // admin components
  { name: 'Pagination', component: Pagination },
  { name: 'TableSearch', component: TableSearch },

  // tabs
  { name: 'HorizontalTabBar', component: HorizontalTabBar },
];

export { components };
