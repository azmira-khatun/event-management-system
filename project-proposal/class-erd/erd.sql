Table role {
  id int [pk]
  name varchar
}

Table user {
  id int [pk]
  firstname varchar
  lastname varchar
  email varchar
  bio text
  isactive boolean
  roleid int [ref: > role.id]
}

Table admin {
  id int [pk]
  userid int [ref: > user.id]
  adminLevel varchar
}

Table customer {
  id int [pk]
  userid int [ref: > user.id]
  address varchar
  eventid int [ref: > event.id]
}

Table venue {
  id int [pk]
  venuename varchar
  venuelocation varchar
  capacity int
  registerid int [ref: > register.id]
}

Table event {
  id int [pk]
  eventname varchar
  eventdate date
  eventtype varchar
  description text
  adminid int [ref: > admin.id]
  venueid int [ref: > venue.id]
}

Table attendee {
  id int [pk]
  userid int [ref: > user.id]
}

Table register {
  id int [pk]
  eventid int [ref: > event.id]
  attendeeid int [ref: > attendee.id]
  registerdate date
  status varchar
}

Table feedback {
  id int [pk]
  feedbackcontent text
  feedbackdate date
  rating int
  attendeeid int [ref: > attendee.id]
  eventid int [ref: > event.id]
}

Table communication {
  id int [pk]
  messagecontent text
  messagedate date
  attendeeid int [ref: > attendee.id]
}

Table expense {
  id int [pk]
  expenseamount decimal
  expensesource varchar
  expensedate date
  eventid int [ref: > event.id]
}

Table eventticket {
  id int [pk]
  eventid int [ref: > event.id]
  adminid int [ref: > admin.id]
  price decimal
  quantity int
}

Table fooditem {
  id int [pk]
  foodname varchar
  description text
  price decimal
  category varchar
  isavailable boolean
  eventid int [ref: > event.id]
}
