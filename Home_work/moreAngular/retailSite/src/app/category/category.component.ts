import { Component, OnInit } from '@angular/core';
import { Categories } from '../shared/categories';
import { Category } from '../shared/category';

@Component({
  selector: 'app-category',
  templateUrl: './category.component.html',
  styleUrls: ['./category.component.css']
})
export class CategoryComponent implements OnInit {
  categories = Categories;

  selectedCategory: Category;


  constructor() { }

  ngOnInit() {
  }

  onSelect(category: Category): void {
    this.selectedCategory = category;
    console.log(this.selectedCategory);
    console.log(category);
  }

}
