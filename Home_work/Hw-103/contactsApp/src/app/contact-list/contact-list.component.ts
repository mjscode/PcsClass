import { Component, OnInit, OnDestroy } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Subscription } from 'rxjs/Subscription';
import { Observable } from 'rxjs/Observable';
import { map } from 'rxjs/operators';
import { Contact } from '../shared/contact';
import { ContactsService } from '../shared/contacts.service';

@Component({
  selector: 'app-contact-list',
  templateUrl: './contact-list.component.html',
  styleUrls: ['./contact-list.component.css']
})
export class ContactListComponent implements OnInit {

  public contacts: Observable<Contact[]>;

  constructor(
    private contactsService: ContactsService) {
  }

  ngOnInit() {

    this.contacts = this.contactsService.getContacts();
  }

  /*ngOnDestroy() {
    this.sub.unsubscribe();
  }*/
}
