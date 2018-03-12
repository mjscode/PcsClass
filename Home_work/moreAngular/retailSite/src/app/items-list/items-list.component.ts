import { Component, OnInit, Input } from '@angular/core';
import { Category } from '../shared/category';

@Component({
  selector: 'app-items-list',
  templateUrl: './items-list.component.html',
  styleUrls: ['./items-list.component.css']
})
export class ItemsListComponent implements OnInit {
  @Input() category: Category

  constructor() { }

  ngOnInit() {
  }

}
