import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';


import { AppComponent } from './app.component';
import { CategoryComponent } from './category/category.component';
import { ItemsListComponent } from './items-list/items-list.component';


@NgModule({
  declarations: [
    AppComponent,
    CategoryComponent,
    ItemsListComponent
  ],
  imports: [
    BrowserModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
