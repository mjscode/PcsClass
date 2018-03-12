import { Component, OnInit } from '@angular/core';
import { Contact } from '../shared/contact';
import { ContactsService } from '../shared/contacts.service';

@Component({
  selector: 'app-add-contacts',
  templateUrl: './add-contacts.component.html',
  styleUrls: ['./add-contacts.component.css']
})
export class AddContactsComponent implements OnInit {

  constructor(private contactsService: ContactsService) { }

  ngOnInit() {
  }
  add(firstName, lastName, email, phone): void {

    const contact = {
      firstName: firstName,
      lastName: lastName,
      email: email,
      phone: phone,
    }
    this.contactsService.addContact(contact)
  };

}