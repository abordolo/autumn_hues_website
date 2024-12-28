// sections
import Section from '@/Components/Site/Sections/Section.vue';
import Container from '@/Components/Site/Sections/Container.vue';

// headings
import DisplayHeading from '@/Components/Site/Texts/DisplayHeading.vue';
import Heading1 from '@/Components/Site/Texts/Heading1.vue';
import Heading2 from '@/Components/Site/Texts/Heading2.vue';
import Heading3 from '@/Components/Site/Texts/Heading3.vue';
import Heading4 from '@/Components/Site/Texts/Heading4.vue';
import Heading5 from '@/Components/Site/Texts/Heading5.vue';
import Heading6 from '@/Components/Site/Texts/Heading6.vue';
import PreHeading from '@/Components/Site/Texts/PreHeading.vue';
import Intro from '@/Components/Site/Texts/Intro.vue';
import BodyText from '@/Components/Site/Texts/BodyText.vue';
import Medium from '@/Components/Site/Texts/Medium.vue';
import Small from '@/Components/Site/Texts/Small.vue';
import ExtraSmall from '@/Components/Site/Texts/ExtraSmall.vue';
import Tiny from '@/Components/Site/Texts/Tiny.vue';
import Large from '@/Components/Site/Texts/Large.vue';

// debug
import DebugGrid from '@/Components/Site/Debug/DebugGrid.vue';
import DebugPanel from '@/Components/Site/Debug/DebugPanel.vue';

// loading indicator
import LoadingIndicator from '@/Components/Site/LoadingIndicator.vue';

// buttons
import AppButton from '@/Components/Site/Buttons/AppButton.vue';
import PrimaryButton from '@/Components/Site/Buttons/PrimaryButton.vue';
import PrimaryLinkButton from '@/Components/Site/Buttons/PrimaryLinkButton.vue';

// form
import FormInput from '@/Components/Site/Form/FormInput.vue';
import FormSelect from './Components/Site/Form/FormSelect.vue';
import FormFileInput from './Components/Site/Form/FormFileInput.vue';
import FormToggle from './Components/Site/Form/FormToggle.vue';
import FormLabel from './Components/Site/Form/FormLabel.vue';

// horizontal tab bar
import HorizontalTabBar from '@/Components/Site/Tabs/HorizontalTabBar.vue';

// page headings
import PageHeading from '@/Components/Site/PageHeadings/PageHeading.vue';

// animate on scroll
import AnimateOnScroll from '@/Components/Site/AnimateOnScroll/AnimateOnScroll.vue';

// text blocks
import HeadingBlock from '@/Components/Site/TextBlocks/HeadingBlock.vue';

// logo
import Logo from '@/Components/Site/Logo/Index.vue';

// admin pages
import AdminIndexPage from '@/Components/Site/Admin/AdminIndexPage/Index.vue';
import AdminShowPage from '@/Components/Site/Admin/AdminShowPage/Index.vue';

// generic form
import GenericForm from '@/Components/Site/Form/GenericForm/Index.vue';

// popup
import Popup from '@/Components/Site/Popup/Index.vue';

// notification
import Notification from '@/Components/Site/Notification/Index.vue';

// transitions
import FadeTransition from '@/Components/Site/Transitions/FadeTransition/Index.vue';

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

  // tabs
  { name: 'HorizontalTabBar', component: HorizontalTabBar },

  // page headings
  { name: 'PageHeading', component: PageHeading },

  // animate on scroll
  { name: 'AnimateOnScroll', component: AnimateOnScroll },

  // text blocks
  { name: 'HeadingBlock', component: HeadingBlock },

  // logo
  { name: 'Logo', component: Logo },

  // admin pages
  { name: 'AdminIndexPage', component: AdminIndexPage },
  { name: 'AdminShowPage', component: AdminShowPage },

  // generic form
  { name: 'GenericForm', component: GenericForm },

  // popup
  { name: 'Popup', component: Popup },

  // notification
  { name: 'Notification', component: Notification },

  // transitions
  { name: 'FadeTransition', component: FadeTransition },
];

export { components };
