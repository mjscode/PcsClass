import { Component, OnInit, OnDestroy } from '@angular/core';
import { ActivatedRoute, ParamMap } from '@angular/router';
import { BlogService } from '../shared/blog.service';
import { Observable } from 'rxjs/Observable';
import { Post } from '../shared/post';
import { Subscription } from 'rxjs/Subscription';
import { switchMap } from 'rxjs/operators';

@Component({
  selector: 'app-blog',
  templateUrl: './blog.component.html',
  styleUrls: ['./blog.component.css']
})
export class BlogComponent implements OnInit, OnDestroy {
  public allPosts: Post[];
  public postsToShow: Post[];
  public index = 0;
  public NUM_POSTS = 3;

  sub: Subscription;
  constructor(private route: ActivatedRoute, private blogService: BlogService) { }

  ngOnInit() {
    /*const blogId = +this.route.snapshot.paramMap.get('blogId');
    this.sub = this.blogService.getPosts(blogId)
      .subscribe(posts => {
        this.allPosts = posts;
        this.updatePosts();
      });*/

    this.sub = this.route.paramMap
      .pipe(switchMap((params: ParamMap) => {
        const blogId = +params.get('blogId');
        return this.blogService.getPosts(blogId);
      })).subscribe(posts => {
        this.allPosts = posts;
        this.updatePosts();
      });
  }

  ngOnDestroy() {
    this.sub.unsubscribe();
  }

  updatePosts() {
    this.postsToShow = this.allPosts.slice(this.index, this.index + this.NUM_POSTS);
  }

  previous() {
    this.index -= this.NUM_POSTS;
    this.updatePosts();
  }

  next() {
    this.index += this.NUM_POSTS;
    this.updatePosts();
  }
}
