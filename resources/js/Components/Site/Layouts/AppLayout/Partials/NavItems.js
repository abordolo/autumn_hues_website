const navItems = [
  {
    name: 'Home',
    type: 'link',
    url: route('home.index'),
    component: 'Home/Index',
  },

  {
    name: 'Product Category',
    type: 'dropdown',
    items: [
      {
        name: 'Category 1',
        url: '#',
      },
      {
        name: 'Category 2',
        url: '#',
      },
      {
        name: 'Category 3',
        url: '#',
      },
    ],
  },

  {
    name: 'Contact Us',
    type: 'link',
    url: '/contact',
    component: 'Home/Index',
  },
];

export { navItems };
