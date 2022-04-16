import { Component, OnInit } from '@angular/core';
import { OwnerService } from 'src/app/services/owner.service';
import { ActivatedRoute, Router } from '@angular/router';
import { PettypeService } from 'src/app/services/pettype.service';

@Component({
  selector: 'app-owner-details',
  templateUrl: './owner-details.component.html',
  styleUrls: ['./owner-details.component.css']
})
export class OwnerDetailsComponent implements OnInit {
  currentOwner = null;
  message = '';
  showMsg: boolean = false;
  pettypes: any;

  constructor(
    private ownerService: OwnerService,
    private route: ActivatedRoute,
    private router: Router, private pettypeService: PettypeService) { }

  ngOnInit(): void {
    this.message = '';
    this.showMsg = false;
    
   console.log(this.route.snapshot.paramMap.get('id'));
    this.getOwner(this.route.snapshot.paramMap.get('id'));
    this.getPettype();
  }

  getOwner(id): void {
    console.log(id);
   
    this.ownerService.read(id)
      .subscribe(
        item => {
          this.currentOwner = item;
          console.log(item);
        },
        error => {
          console.log(error);
        }
    );
  }

  getPettype(): void {
    this.pettypeService.readAll()
      .subscribe(
        items => {
          this.pettypes = items;
           console.log(items);         
        },
        error => {
          console.log(error);
        }
      );
  }

  updateOwner(): void {
    //console.log("ghgfh"+this.currentOwner.id);
    console.log(this.currentOwner);
    this.ownerService.update(this.currentOwner.id, this.currentOwner)
      .subscribe(
        response => {
          console.log(response);
          this.message = 'The owner detail was updated successfully!';
          this.showMsg = true;

        },
        error => {
          console.log(error);
        }
    );
  }

  deleteOwner(): void {
    if(confirm('This action will delete this owner. Are you sure?')) {
      console.log(this.currentOwner.id);
      this.ownerService.delete(this.currentOwner.id)
      .subscribe(
        response => {
         // console.log(response);
          this.router.navigate(['/owners']);
        },
        error => {
          console.log(error);
        }
    );
    }
  }

  // getPettypeService(): void {
  //   this.pettypeService.readAll()
  //     .subscribe(
  //       items => {
  //         this.pettypes = items.classes;
  //         //console.log(items);
  //       },
  //       error => {
  //         console.log(error);
  //       }
  //     );
  // }
}
