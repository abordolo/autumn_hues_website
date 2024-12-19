const months = [
  'Jan',
  'Feb',
  'Mar',
  'Apr',
  'May',
  'Jun',
  'Jul',
  'Aug',
  'Sep',
  'Oct',
  'Nov',
  'Dec',
];

const dateString = (data) => {
  let d = new Date(data);
  let year = d.getFullYear();
  let monthIndex = d.getMonth();
  let monthName = months[monthIndex];

  let day = d.getDate();
  return `${day} ${monthName}, ${year}`;
};

export { dateString };
