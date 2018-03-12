import { Component, OnInit, OnDestroy } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Subscription } from 'rxjs/Subscription';
import { Observable } from 'rxjs/Observable';
import { map } from 'rxjs/operators';
import { Blog } from '../shared/blog';
import { BlogService } from '../shared/blog.service';

@Component({
  selector: 'app-blog-list',
  templateUrl: './blog-list.component.html',
  styleUrls: ['./blog-list.component.css']
})
export class BlogListComponent implements OnInit/*, OnDestroy*/ {
  // public blogs: any[];
  // private sub: Subscription;
  public blogs: Observable<Blog[]>;

  constructor(/*private httpClient: HttpClientblogService*/
    private blogsService: BlogService) {

  }

  ngOnInit() {
    // this.sub = this.httpClient.get<any[]>('https://jsonplaceholder.typicode.com/users')
    //  .subscribe(blogs => this.blogs = blogs);
    /*this.blogs = this.httpClient.get<any[]>('https://jsonplaceholder.typicode.com/users')
      .pipe(map(blogs => blogs.map(blogInfo => ({
        name: blogInfo.name,
        website: blogInfo.website,
        company: blogInfo.company.name
      }))));*/
    this.blogs = this.blogsService.getBlogs();
  }

  /*ngOnDestroy() {
    this.sub.unsubscribe();
  }*/
}
