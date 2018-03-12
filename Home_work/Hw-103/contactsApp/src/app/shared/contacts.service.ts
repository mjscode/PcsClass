import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { catchError, tap } from 'rxjs/operators';
import { map } from 'rxjs/operators';
import { Observable } from 'rxjs/Observable';
import { Contact } from './contact';

@Injectable()
export class ContactsService {

  constructor(private httpClient: HttpClient) { }

  getContacts(): Observable<Contact[]> {
    return this.httpClient.get<any[]>('http://localhost/class/Html/Home_work/Hw-103/contactsApp/php/getContacts.php');
  }
  addContact(contact): void {
    alert(JSON.stringify(contact));
    this.httpClient.post('http://localhost/class/Html/Home_work/Hw-103/contactsApp/php/addContact.php',
      JSON.stringify(contact));

  }
}
