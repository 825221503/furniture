(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["order"],{"0979":function(t,e,a){},"580e":function(t,e,a){"use strict";a.r(e);var r=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"orders"},[a("el-breadcrumb",{attrs:{"separator-class":"el-icon-arrow-right"}},[a("el-breadcrumb-item",{attrs:{to:{path:"/order"}}},[t._v("订单管理")]),a("el-breadcrumb-item",[t._v("订单管理")])],1),a("el-card",[a("el-tabs",{nativeOn:{click:function(e){return t.handleTabClick(e)}},model:{value:t.activeName,callback:function(e){t.activeName=e},expression:"activeName"}},[a("el-tab-pane",{attrs:{label:"全部("+t.total1+")",name:"1"}},[a("el-table",{attrs:{data:t.data1}},[a("el-table-column",{attrs:{prop:"number",label:"订单编号",align:"center"}}),a("el-table-column",{attrs:{prop:"create_time",label:"创建时间",align:"center"}}),a("el-table-column",{attrs:{prop:"state",label:"状态",width:"200",align:"center"},scopedSlots:t._u([{key:"default",fn:function(e){return[1===e.row.state?a("span",[t._v("待发货")]):2===e.row.state?a("span",[t._v("配送中")]):3===e.row.state?a("span",[t._v("已收货")]):4===e.row.state?a("span",[t._v("已评价")]):5===e.row.state?a("span",[t._v("退换货")]):6===e.row.state?a("span",[t._v("已完成退货")]):t._e()]}}])}),a("el-table-column",{attrs:{prop:"aid",label:"地址信息",width:"200","show-overflow-tooltip":!0,align:"center"},scopedSlots:t._u([{key:"default",fn:function(e){return[t._v(t._s(e.row.province)+t._s(e.row.city)+t._s(e.row.area)+t._s(e.row.address))]}}])}),a("el-table-column",{attrs:{prop:"total",label:"总价格",align:"center"},scopedSlots:t._u([{key:"default",fn:function(e){var a=e.row;return[t._v(t._s(t._f("currency")(a.total)))]}}])}),a("el-table-column",{attrs:{prop:"backNote",label:"备注",align:"center",width:"100"},scopedSlots:t._u([{key:"default",fn:function(e){var a=e.row;return[t._v(t._s(a.backNote||"暂无数据"))]}}])}),a("el-table-column",{attrs:{label:"操作",align:"center"},scopedSlots:t._u([{key:"default",fn:function(e){return[a("el-button",{attrs:{size:"mini"},on:{click:function(a){return t.fetchOrderGood(e.row.id)}}},[t._v("查看商品")])]}}])})],1),a("el-row",{staticStyle:{"margin-top":"20px"},attrs:{type:"flex",justify:"center"}},[a("el-pagination",{attrs:{"current-page":t.page1,"page-sizes":[5,20,30,50],"page-size":t.pageSize1,layout:"total, sizes, prev, pager, next, jumper",total:t.total1},on:{"size-change":t.handleSizeChange1,"current-change":t.handleCurrentChange1,"update:currentPage":function(e){t.page1=e},"update:current-page":function(e){t.page1=e}}})],1)],1),a("el-tab-pane",{attrs:{label:"待发货("+t.total2+")",name:"2"}},[a("el-table",{attrs:{data:t.data2}},[a("el-table-column",{attrs:{prop:"number",label:"订单编号",align:"center"}}),a("el-table-column",{attrs:{prop:"create_time",label:"创建时间",align:"center"}}),a("el-table-column",{attrs:{prop:"aid",label:"地址信息",width:"200","show-overflow-tooltip":!0,align:"center"},scopedSlots:t._u([{key:"default",fn:function(e){return[t._v(t._s(e.row.province)+t._s(e.row.city)+t._s(e.row.area)+t._s(e.row.address))]}}])}),a("el-table-column",{attrs:{prop:"total",label:"总价格",align:"center"},scopedSlots:t._u([{key:"default",fn:function(e){var a=e.row;return[t._v(t._s(t._f("currency")(a.total)))]}}])}),a("el-table-column",{attrs:{prop:"backNote",label:"备注",align:"center",width:"100"},scopedSlots:t._u([{key:"default",fn:function(e){var a=e.row;return[t._v(t._s(a.backNote||"暂无数据"))]}}])}),a("el-table-column",{attrs:{label:"操作",align:"center"},scopedSlots:t._u([{key:"default",fn:function(e){return[a("el-button",{attrs:{size:"mini"},on:{click:function(a){return t.fetchOrderGood(e.row.id)}}},[t._v("查看商品")]),a("el-button",{attrs:{size:"mini"},on:{click:function(a){return t.handleSend(e.row.id)}}},[t._v("发货")])]}}])})],1),a("el-row",{staticStyle:{"margin-top":"20px"},attrs:{type:"flex",justify:"center"}},[a("el-pagination",{attrs:{"current-page":t.page2,"page-sizes":[5,20,30,50],"page-size":t.pageSize2,layout:"total, sizes, prev, pager, next, jumper",total:t.total2},on:{"size-change":function(e){return t.fetchAllOrder2()},"current-change":function(e){return t.fetchAllOrder2()},"update:currentPage":function(e){t.page2=e},"update:current-page":function(e){t.page2=e}}})],1)],1),a("el-tab-pane",{attrs:{label:"配送中("+t.total3+")",name:"3"}},[a("el-table",{attrs:{data:t.data3}},[a("el-table-column",{attrs:{prop:"number",label:"订单编号",align:"center"}}),a("el-table-column",{attrs:{prop:"create_time",label:"创建时间",align:"center"}}),a("el-table-column",{attrs:{prop:"aid",label:"地址信息",width:"200","show-overflow-tooltip":!0,align:"center"},scopedSlots:t._u([{key:"default",fn:function(e){return[t._v(t._s(e.row.province)+t._s(e.row.city)+t._s(e.row.area)+t._s(e.row.address))]}}])}),a("el-table-column",{attrs:{prop:"total",label:"总价格",align:"center"},scopedSlots:t._u([{key:"default",fn:function(e){var a=e.row;return[t._v(t._s(t._f("currency")(a.total)))]}}])}),a("el-table-column",{attrs:{prop:"backNote",label:"备注",align:"center",width:"100"},scopedSlots:t._u([{key:"default",fn:function(e){var a=e.row;return[t._v(t._s(a.backNote||"暂无数据"))]}}])}),a("el-table-column",{attrs:{label:"操作",align:"center"},scopedSlots:t._u([{key:"default",fn:function(e){return[a("el-button",{attrs:{size:"mini"},on:{click:function(a){return t.fetchOrderGood(e.row.id)}}},[t._v("查看商品")])]}}])})],1),a("el-row",{staticStyle:{"margin-top":"20px"},attrs:{type:"flex",justify:"center"}},[a("el-pagination",{attrs:{"current-page":t.page3,"page-sizes":[5,20,30,50],"page-size":t.pageSize3,layout:"total, sizes, prev, pager, next, jumper",total:t.total3},on:{"size-change":function(e){return t.fetchAllOrder3()},"current-change":function(e){return t.fetchAllOrder3()},"update:currentPage":function(e){t.page3=e},"update:current-page":function(e){t.page3=e}}})],1)],1),a("el-tab-pane",{attrs:{label:"已收货("+t.total4+")",name:"4"}},[a("el-table",{attrs:{data:t.data4}},[a("el-table-column",{attrs:{prop:"number",label:"订单编号",align:"center"}}),a("el-table-column",{attrs:{prop:"create_time",label:"创建时间",align:"center"}}),a("el-table-column",{attrs:{prop:"aid",label:"地址信息",width:"200","show-overflow-tooltip":!0,align:"center"},scopedSlots:t._u([{key:"default",fn:function(e){return[t._v(t._s(e.row.province)+t._s(e.row.city)+t._s(e.row.area)+t._s(e.row.address))]}}])}),a("el-table-column",{attrs:{prop:"total",label:"总价格",align:"center"},scopedSlots:t._u([{key:"default",fn:function(e){var a=e.row;return[t._v(t._s(t._f("currency")(a.total)))]}}])}),a("el-table-column",{attrs:{prop:"backNote",label:"备注",align:"center",width:"100"},scopedSlots:t._u([{key:"default",fn:function(e){var a=e.row;return[t._v(t._s(a.backNote||"暂无数据"))]}}])}),a("el-table-column",{attrs:{label:"操作",align:"center"},scopedSlots:t._u([{key:"default",fn:function(e){return[a("el-button",{attrs:{size:"mini"},on:{click:function(a){return t.fetchOrderGood(e.row.id)}}},[t._v("查看商品")])]}}])})],1),a("el-row",{staticStyle:{"margin-top":"20px"},attrs:{type:"flex",justify:"center"}},[a("el-pagination",{attrs:{"current-page":t.page4,"page-sizes":[5,20,30,50],"page-size":t.pageSize4,layout:"total, sizes, prev, pager, next, jumper",total:t.total4},on:{"size-change":function(e){return t.fetchAllOrder4()},"current-change":function(e){return t.fetchAllOrder4()},"update:currentPage":function(e){t.page4=e},"update:current-page":function(e){t.page4=e}}})],1)],1),a("el-tab-pane",{attrs:{label:"已评价("+t.total5+")",name:"5"}},[a("el-table",{attrs:{data:t.data5}},[a("el-table-column",{attrs:{prop:"number",label:"订单编号",align:"center"}}),a("el-table-column",{attrs:{prop:"create_time",label:"创建时间",align:"center"}}),a("el-table-column",{attrs:{prop:"aid",label:"地址信息",width:"200","show-overflow-tooltip":!0,align:"center"},scopedSlots:t._u([{key:"default",fn:function(e){return[t._v(t._s(e.row.province)+t._s(e.row.city)+t._s(e.row.area)+t._s(e.row.address))]}}])}),a("el-table-column",{attrs:{prop:"total",label:"总价格",align:"center"},scopedSlots:t._u([{key:"default",fn:function(e){var a=e.row;return[t._v(t._s(t._f("currency")(a.total)))]}}])}),a("el-table-column",{attrs:{prop:"backNote",label:"备注",align:"center",width:"100"},scopedSlots:t._u([{key:"default",fn:function(e){var a=e.row;return[t._v(t._s(a.backNote||"暂无数据"))]}}])}),a("el-table-column",{attrs:{label:"操作",align:"center"},scopedSlots:t._u([{key:"default",fn:function(e){return[a("el-button",{attrs:{size:"mini"},on:{click:function(a){return t.fetchOrderGood(e.row.id)}}},[t._v("查看商品")])]}}])})],1),a("el-row",{staticStyle:{"margin-top":"20px"},attrs:{type:"flex",justify:"center"}},[a("el-pagination",{attrs:{"current-page":t.page5,"page-sizes":[5,20,30,50],"page-size":t.pageSize5,layout:"total, sizes, prev, pager, next, jumper",total:t.total5},on:{"size-change":function(e){return t.fetchAllOrder5()},"current-change":function(e){return t.fetchAllOrder5()},"update:currentPage":function(e){t.page5=e},"update:current-page":function(e){t.page5=e}}})],1)],1),a("el-tab-pane",{attrs:{label:"退换货("+t.total6+")",name:"6"}},[a("el-table",{attrs:{data:t.data6}},[a("el-table-column",{attrs:{prop:"number",label:"订单编号",align:"center"}}),a("el-table-column",{attrs:{prop:"create_time",label:"创建时间",align:"center"}}),a("el-table-column",{attrs:{prop:"aid",label:"地址信息",width:"200","show-overflow-tooltip":!0,align:"center"},scopedSlots:t._u([{key:"default",fn:function(e){return[t._v(t._s(e.row.province)+t._s(e.row.city)+t._s(e.row.area)+t._s(e.row.address))]}}])}),a("el-table-column",{attrs:{prop:"total",label:"总价格",align:"center"},scopedSlots:t._u([{key:"default",fn:function(e){var a=e.row;return[t._v(t._s(t._f("currency")(a.total)))]}}])}),a("el-table-column",{attrs:{prop:"backNote",label:"备注",align:"center",width:"100"},scopedSlots:t._u([{key:"default",fn:function(e){var a=e.row;return[t._v(t._s(a.backNote||"暂无数据"))]}}])}),a("el-table-column",{attrs:{label:"操作",align:"center"},scopedSlots:t._u([{key:"default",fn:function(e){return[a("el-button",{attrs:{size:"mini"},on:{click:function(a){return t.fetchOrderGood(e.row.id)}}},[t._v("查看商品")]),a("el-button",{attrs:{size:"mini"},on:{click:function(a){return t.handleReject(e.row.id)}}},[t._v("完成退货")])]}}])})],1),a("el-row",{staticStyle:{"margin-top":"20px"},attrs:{type:"flex",justify:"center"}},[a("el-pagination",{attrs:{"current-page":t.page6,"page-sizes":[5,20,30,50],"page-size":t.pageSize6,layout:"total, sizes, prev, pager, next, jumper",total:t.total6},on:{"size-change":function(e){return t.fetchAllOrder6()},"current-change":function(e){return t.fetchAllOrder6()},"update:currentPage":function(e){t.page6=e},"update:current-page":function(e){t.page6=e}}})],1)],1)],1)],1),a("el-dialog",{attrs:{title:"查看当前订单商品",visible:t.dialogVisible,width:"70%"},on:{"update:visible":function(e){t.dialogVisible=e}}},[a("el-table",{attrs:{data:t.GoodData}},[a("el-table-column",{attrs:{label:"当前订单",prop:"oid"}}),a("el-table-column",{attrs:{label:"商品id",prop:"gid"}}),a("el-table-column",{attrs:{label:"商品名称",prop:"name"}}),a("el-table-column",{attrs:{label:"商品图片"},scopedSlots:t._u([{key:"default",fn:function(t){return[a("img",{attrs:{src:t.row.thumb,alt:"",width:"100",height:"100"}})]}}])}),a("el-table-column",{attrs:{label:"商品价格",prop:"price"}}),a("el-table-column",{attrs:{label:"购买数量",prop:"count"}}),a("el-table-column",{attrs:{label:"规格id",prop:"color_id"}}),a("el-table-column",{attrs:{label:"规格颜色",prop:"color_name"}})],1),a("span",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[a("el-button",{on:{click:function(e){t.dialogVisible=!1}}},[t._v("取消")])],1)],1)],1)},l=[],n={name:"orders",data:function(){return{activeName:"1",GoodData:[],url:"/order",url1:"/ordergoods",data1:[],page1:1,pageSize1:5,total1:0,oid:0,data2:[],page2:1,pageSize2:5,total2:0,data3:[],page3:1,pageSize3:5,total3:0,data4:[],page4:1,pageSize4:5,total4:0,data5:[],page5:1,pageSize5:5,total5:0,data6:[],page6:1,pageSize6:5,total6:0,dialogVisible:!1}},components:{},created:function(){},mounted:function(){this.fetchAllOrder1(),this.fetchAllOrder2(),this.fetchAllOrder3(),this.fetchAllOrder4(),this.fetchAllOrder5(),this.fetchAllOrder6()},methods:{handleSend:function(t){var e=this;this.$http.put(this.url+"/"+t,{state:2}).then((function(t){200==t.data.code&&(e.fetchAllOrder1(),e.fetchAllOrder2(),e.fetchAllOrder3(),e.$message.success("更新成功"))}))},handleReject:function(t){var e=this;this.$http.put(this.url+"/"+t,{state:6}).then((function(t){200==t.data.code&&(e.fetchAllOrder1(),e.fetchAllOrder6(),e.$message.success("退货成功"))}))},handleSizeChange1:function(){this.fetchAllOrder1()},handleCurrentChange1:function(){this.fetchAllOrder1()},fetchAllOrder1:function(){var t=this;this.$http.get(this.url,{params:{page:this.page1,pageSize:this.pageSize1}}).then((function(e){200==e.data.code&&(t.data1=e.data.data,t.total1=e.data.total,console.log(t.data1))}))},fetchAllOrder2:function(){var t=this;this.$http.get(this.url,{params:{page:this.page2,pageSize:this.pageSize2,state:1}}).then((function(e){200==e.data.code&&(t.data2=e.data.data,t.total2=e.data.total,console.log(t.data1))}))},fetchAllOrder3:function(){var t=this;this.$http.get(this.url,{params:{page:this.page3,pageSize:this.pageSize3,state:2}}).then((function(e){200==e.data.code&&(t.data3=e.data.data,t.total3=e.data.total,console.log(t.data3))}))},fetchAllOrder4:function(){var t=this;this.$http.get(this.url,{params:{page:this.page4,pageSize:this.pageSize4,state:3}}).then((function(e){200==e.data.code&&(t.data4=e.data.data,t.total4=e.data.total,console.log(t.data4))}))},fetchAllOrder5:function(){var t=this;this.$http.get(this.url,{params:{page:this.page5,pageSize:this.pageSize5,state:4}}).then((function(e){200==e.data.code&&(t.data5=e.data.data,t.total5=e.data.total,console.log(t.data5))}))},fetchAllOrder6:function(){var t=this;this.$http.get(this.url,{params:{page:this.page6,pageSize:this.pageSize6,state:5}}).then((function(e){200==e.data.code&&(t.data6=e.data.data,t.total6=e.data.total,console.log(t.data6))}))},fetchOrderGood:function(t){var e=this;this.dialogVisible=!0,this.$http.get(this.url1,{params:{oid:t,page:1,pageSize:1e3}}).then((function(t){200==t.data.code&&(e.GoodData=t.data.data,console.log(t))}))}},watch:{page:function(t,e){this.fetchData()},pageSize:function(t,e){this.fetchData()}}},o=n,c=(a("a94d"),a("2877")),i=Object(c["a"])(o,r,l,!1,null,"ccb70ac6",null);e["default"]=i.exports},a94d:function(t,e,a){"use strict";var r=a("0979"),l=a.n(r);l.a},ec0f:function(t,e,a){"use strict";a.r(e);var r=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"count"},[t._v("数据统计")])},l=[],n={name:"count",data:function(){return{}},components:{},created:function(){},mounted:function(){},methods:{}},o=n,c=a("2877"),i=Object(c["a"])(o,r,l,!1,null,"702c5f73",null);e["default"]=i.exports},f86d:function(t,e,a){"use strict";a.r(e);var r=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"order"},[a("h1",[t._v("订单管理二级路由")]),a("router-view")],1)},l=[],n={name:"order",data:function(){return{}},components:{},created:function(){},mounted:function(){},methods:{}},o=n,c=a("2877"),i=Object(c["a"])(o,r,l,!1,null,"f5eecd9c",null);e["default"]=i.exports}}]);
//# sourceMappingURL=order.d9b13c8b.js.map