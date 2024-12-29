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
        name: 'Jewelry',
        url: route('product-categories.show', 'jewelry'),
      },
      {
        name: 'Eco Product',
        url: route('product-categories.show', 'eco-products'),
      },
    ],
  },

  {
    name: 'Contact Us',
    type: 'link',
    url: route('contact-us.index'),
    component: 'Home/Index',
  },
];

export { navItems };
