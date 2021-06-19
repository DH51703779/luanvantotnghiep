const date = new Date();
var year_current = date.getFullYear();
var month_current = date.getMonth();
function next_month() {
    month_current++;
    if (month_current > 12) {
        month_current = 1;
        year_current++;
    }
    console.log(month_current);
    console.log(year_current);
}
function pre_month() {
    month_current--;
    if (month_current < 1) {
        month_current = 12;
        year_current--;
    }
    console.log(month_current);
    console.log(year_current);
}
const renderCalendar = () => {
    date.setDate(1);
    const monthDays = document.querySelector(".days");
    const lastDay = new Date(
        date.getFullYear(),
        date.getMonth() + 1,
        0
    ).getDate();
    const prevLastDay = new Date(
        date.getFullYear(),
        date.getMonth(),
        0
    ).getDate();
    const lastDayIndex = new Date(
        date.getFullYear(),
        date.getMonth() + 1,
        0
    ).getDate();
    const nextDays = 7 - lastDayIndex - 1;
    const firstDayIndex = date.getDate();
    const months = [
        " Tháng 1",
        " Tháng 2",
        " Tháng 3",
        " Tháng 4",
        " Tháng 5",
        " Tháng 6",
        " Tháng 7",
        " Tháng 8",
        " Tháng 9",
        " Tháng 10",
        " Tháng 11",
        " Tháng 12",
    ];
    document.getElementById("month").innerHTML = months[date.getMonth()];
    document.getElementById("year").innerHTML = year_current;
    let days = "";
    for (let x = firstDayIndex; x > 0; x--) {
        if (
            i === new Date().getDate() &&
            date.getMonth === new Date().getMonth() &&
            date.getFullYear() === new Date().getFullYear()
        ) {
            days += '<div class ="current-day">${1}</div>';
        } else {
            days += "<div>${i}</div>";
        }
    }
    for (let j = 1; J < nextDays; j++) {
        days += '<div class="next-day">${i}</div>';
        monthDays.innerHTML = days;
    }
};
document.querySelector(".prev").addEventListener("click", () => {
    date.setMonth(date.getMonth() - 1);
    renderCalendar();
});
document.querySelector(".next").addEventListener("click", () => {
    date.setMonth(date.getMonth() + 1);
    renderCalendar();
});
renderCalendar();


  monthnames = new Array("January", "Februrary", "March", "April", "May", "June", "July", "August", "September", "October", "November", "Decemeber");
  var linkcount = 0;
  function addlink(month, day, href) {
    var entry = new Array(3);
    entry[0] = month;
    entry[1] = day;
    entry[2] = href;
    this[linkcount++] = entry;
  }
  Array.prototype.addlink = addlink;
  linkdays = new Array();
  monthdays = new Array(12);
  monthdays[0] = 31;
  monthdays[1] = 28;
  monthdays[2] = 31;
  monthdays[3] = 30;
  monthdays[4] = 31;
  monthdays[5] = 30;
  monthdays[6] = 31;
  monthdays[7] = 31;
  monthdays[8] = 30;
  monthdays[9] = 31;
  monthdays[10] = 30;
  monthdays[11] = 31;
  todayDate = new Date();
  thisday = todayDate.getDay();
  thismonth = todayDate.getMonth();
  thisdate = todayDate.getDate();
  thisyear = todayDate.getYear();
  thisyear = thisyear % 100;
  thisyear = ((thisyear < 50) ? (2000 + thisyear) : (1900 + thisyear));
  if (((thisyear % 4 == 0)
  && !(thisyear % 100 == 0))
  || (thisyear % 400 == 0)) monthdays[1]++;
  startspaces = thisdate;
  while (startspaces > 7) startspaces -= 7;
  startspaces = thisday - startspaces + 1;
  if (startspaces < 0) startspaces += 7;
  document.getElementById('thang').innerHTML='ahihihi'
  
  for (s = 0; s < startspaces; s++) {
    document.write("<td> </td>");
  }
  count = 1;
  while (count <= monthdays[thismonth]) {
    for (b = startspaces; b < 7; b++) {
      linktrue = false;
      document.write("<td>");
      for (c = 0; c < linkdays.length; c++) {
        if (linkdays[c] != null) {
          if ((linkdays[c][0] == thismonth + 1) && (linkdays[c][1] == count)) {
            document.write("<a href=\"" + linkdays[c][2] + "\">");
            linktrue = true;
          }
        }
      }
      if (count == thisdate) {
        document.write("<font color='FF0000'><strong>");
      }
      if (count <= monthdays[thismonth]) {
        document.write(count);
      }
      else {
        document.write(" ");
      }
      if (count == thisdate) {
        document.write("</strong></font>");
      }
      if (linktrue)
        document.write("</a>");
      document.write("</td>");
      count++;
    }
    document.write("</tr>");
    document.write("<tr>");
    startspaces = 0;
  }
  document.write("</table></p>");
  // End -->
  